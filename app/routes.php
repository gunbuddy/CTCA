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

App::bind('CategoriesRepository', 'MysqlCategoriesRepository');

Route::get('/', 'HomeController@showCategories');
Route::get('/comparar/{category}/!', 'HomeController@showCategory');
Route::post('/tunnel/products/{category}', 'ProductsController@showProducts');

/** Backend interface **/
Route::get('backend', array('as' => 'backend.login', 'uses' => 'Backend\HomeController@showLogin'));
Route::post('backend', array('as' => 'backend.get-login', 'uses' => 'Backend\HomeController@getLogin'));

Route::get('backend/v1', array('as' => 'backend.service', 'uses' => 'Backend\ServiceController@showInterface'));

// Route group for API versioning
Route::group(array('prefix' => 'backend/api/v1', 'before' => 'auth.basic'), function()
{
    Route::get('partial/{partial}.template', array('as' => 'backend.partial', 'uses' => 'Backend\PartialController@showTemplate'));
    Route::resource('category', 'Backend\CategoryController');
    Route::controller('product', 'Backend\ProductController');
});

