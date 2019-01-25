<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//login page
Route::get('/', 'AppAuthController@index');
//login function
Route::post('/', ['uses' => 'AppAuthController@login', 'as' => 'login']);
//dashboard
Route::get('/dashboard', ['uses' => 'AppDashboardController@index', 'as' => 'app.index']);
//prize setting
Route::get('/prize', ['uses' => 'PrizeSettingController@prize', 'as' => 'app.prize']);

//API auth portal
Route::post('api/auth', 'AuthController');
//API reg user outlet
Route::post('api/register', 'RegUserController');

//API Group
Route::group(['prefix' => 'api', 'middleware' => 'api_token'], function(){
	//get promotion data
	Route::post('promo', 'PromoController');
	//get all product data
	Route::post('product/all', 'ProductController@all');
	//get specific product
	Route::post('product/show/{kode}', 'ProductController@show');
	//get prizes data
	Route::post('prize/get', 'PrizeController');
	//get Dashboard data
	Route::post('dashboard', 'DashboardController');
	//Register user game
	Route::post('game/register', 'GameController@register');
	//Play game
	Route::post('game/play', 'GameController@play');
});

Route::post('test', 'TestController@base');