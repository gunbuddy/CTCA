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

// Front-end API
Route::post('/tunnel/products/{category}', 'ProductsController@showProducts');

/** Backend interface **/
Route::get('backend/v1', array('as' => 'backend.service', 'uses' => 'Backend\ServiceController@showInterface'));

// Route group for API versioning
Route::group(array('prefix' => 'backend/api/v1'), function()
{
    Route::get('partial/{partial}.template', array('as' => 'backend.partial', 'uses' => 'Backend\PartialController@showTemplate'));
    Route::resource('category', 'Backend\CategoryController');
    Route::controller('product', 'Backend\ProductController');
});

// These routes has to be at the end, because these points to the main route backend/
Route::controller('backend', 'Backend\HomeController');
Route::get('backend', array('as' => 'backend.login', 'uses' => 'Backend\HomeController@getLogin'));
Route::post('backend', array('as' => 'backend.get-login', 'uses' => 'Backend\HomeController@postLogin'));


