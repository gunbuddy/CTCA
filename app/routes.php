<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/* Start bindings */
App::bind('CategoriesRepository', 'PostgresCategoriesRepository');
App::bind('SubcategoriesRepository', 'PostgresSubcategoriesRepository');
App::bind('Aller\Stat\StatInterface', 'Aller\Stat\StatPostgres');
/* End bindings */

Route::get('/', 'HomeController@showCategories');
Route::get('/show/{category}', 'HomeController@showCategory');
Route::get('/show-comparison/{category}/{slug}', 'HomeController@showComparison');

Route::get('asset/{asset}', 'AssetController@showAsset');

// Front-end API
Route::post('/tunnel/products/{category}', 'ProductsController@showProducts');

/** Backend routes **/
Route::group(array('prefix' => 'backend'), function(){

	Route::get('dashboard', 'Backend\DashboardController@showIndex');
	Route::resource('users', 'Backend\UserController');
	Route::resource('invoices', 'Backend\InvoiceController');
	Route::get('tools', 'Backend\ToolsController@showIndex');

	// View products routes and create products routes
	Route::resource('categories/products', 'Backend\ProductController');

	// Show companies view
	Route::resource('categories/companies', 'Backend\CompanyController');

	// Show category routes
	Route::get('categories/{id}', 'Backend\CategoryController@showCategory');
	Route::get('categories/{id}/stats', 'Backend\CategoryController@showStats');
	Route::get('categories/{id}/subcategories', 'Backend\CategoryController@showSubcategories');
	Route::get('categories/{id}/reports', 'Backend\CategoryController@showReports');
});


// These routes has to be at the end, because these points to the main route backend/
Route::controller('backend', 'Backend\HomeController');
Route::get('backend', array('as' => 'backend.login', 'uses' => 'Backend\HomeController@getLogin'));
Route::post('backend', array('as' => 'backend.get-login', 'uses' => 'Backend\HomeController@postLogin'));


