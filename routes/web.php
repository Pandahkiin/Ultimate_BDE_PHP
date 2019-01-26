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

Auth::routes();
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

/* Main routes */
Route::get('/home', 'HomeController@index')->name('Acceuil');
Route::get('/evenements', 'EventsController@index')->name('Evenements');
Route::get('/boutique', 'ShopController@index')->name('Boutique');
Route::get('/suggestions', 'SuggestionsController@index')->name('Boite à idées');

/* Admin routes */
Route::group(['middleware' => 'App\Http\Middleware\BDEMiddleware'], function() {
    Route::get('/administration', 'AdminController@index')->name('Admin');
    Route::get('/getRegisterList','AdminController@getRegisterList');
    Route::post('/adminUploadPicture','AdminController@pictureUpload');
});

/* Ajax interaction routes */
Route::post('/registerEvent','EventsController@registerEvent');
Route::post('/unregisterEvent','EventsController@unregisterEvent');

/*Shopping cart routes*/
Route::get('/form', 'CartController@index');
Route::post('/add', 'CartController@add');
Route::get('/cart', 'CartController@cart');