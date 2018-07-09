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

// Route::get('/', function () {return view('home');})->middleware('auth');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//google
Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

//home
Route::get('/home', 'HomeController@index')->name('home');

//settings
Route::get('/settings', 'SettingsController@index');
Route::post('/settings', array(
  'as' => 'settings',
  'uses' => 'SettingsController@update'
));


//profile
Route::get('/profile', 'ProfileController@index');
Route::post('/profile', 'ProfileController@uploadProfilePhoto');

//products
Route::get('/products', 'ProductsController@index')->name('products');
Route::post('/products', 'ProductsController@addProduct');
Route::get('/products/{id}', 'ProductsController@showProduct');
