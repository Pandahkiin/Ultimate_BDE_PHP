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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

/* Main routes */
Route::get('/home', 'HomeController@index')->name('Acceuil');
Route::get('/evenements', 'EventsController@index')->name('Evenements');
Route::get('/boutique', 'ShopController@index')->name('Boutique');
Route::get('/suggestions', 'SuggestionsController@index')->name('Boite à idées');
Route::get('/panier', 'CartController@index')->name('Panier');

/* Admin routes */
Route::group(['middleware' => 'App\Http\Middleware\BDEMiddleware'], function() {
    Route::get('/administration', 'AdminController@index')->name('Admin');
    Route::get('/getRegisterList','AdminController@getRegisterList');
    Route::post('/editComment','AdminController@editComment');
});

Route::group(['middleware' => 'App\Http\Middleware\CESIEmployeeMiddleWare'], function() {
    Route::post('/reportComment','AdminController@reportComment');
    Route::get('/getPictures', 'PictureController@getPictures');
});

/* Ajax interaction routes */
Route::post('/uploadPicture','PictureController@upload');
Route::post('/sendComment','PictureController@createComment');
Route::post('/addToCart', 'CartController@addToCart');
/*Shopping cart routes*/
Route::get('/form', 'CartController@index');
Route::post('/add', 'CartController@add');
Route::get('/cart', 'CartController@cart');