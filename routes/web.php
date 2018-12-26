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

Route::get('/', function () {
    return view('welcome');
});

//API auth portal
Route::post('api/auth', 'AuthController');
//API reg user outlet
Route::post('api/register', 'RegUserController');

//API Group
Route::group(['prefix' => 'api', 'middleware' => 'api_token'], function(){
	//get promotion data
	Route::post('promo', 'PromoController');
	//get Dashboard data
	Route::post('dashboard', 'DashboardController');
	//Register user game
	Route::post('game/register', 'GameController@register');
	//Play game
	Route::post('game/play', 'GameController@play');
});

Route::post('test', 'TestController@base');