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
Route::get('/', ['uses' => 'AppAuthController@index', 'as' => 'login']);
//login function
Route::post('/', ['uses' => 'AppAuthController@login', 'as' => 'login']);
//logout function
Route::get('/logout', ['uses' => 'AppAuthController@logout', 'as' => 'logout']);

Route::group(['middleware' => 'app_auth'], function(){
	//dashboard
	Route::get('/dashboard', ['uses' => 'AppDashboardController@index', 'as' => 'dashboard.index']);
	//show setting
	Route::get('/prize', ['uses' => 'PrizeSettingController@prize', 'as' => 'app.prize']);
	//create setting
	Route::get('prize/create', ['uses' => 'PrizeSettingController@create', 'as' => 'app.create']);
	//add setting
	Route::post('/prize/add', ['uses' => 'PrizeSettingController@add', 'as' => 'app.addPrize']);
	//del setting
	Route::delete('/prize/delete', ['uses' => 'PrizeSettingController@delete', 'as' => 'app.delPrize']);
	//outlet resource
	Route::resource('outlets', 'OutletResourceController')->only([
		'index','show','edit','update'
	]);
	//produk resource
    Route::resource('produk', 'ProdukResourceController');
    //android user resource
    Route::resource('user/android', 'AndroUserResourceController');
    //promo
    Route::resource('banner', 'PromoResourceController');

    //utilities
    Route::match(['get','post'], 'utilities/produk/get', ['uses' => 'UtilitiesController@getDaftarProduk', 'as' => 'utilities.get_produk']);
});

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