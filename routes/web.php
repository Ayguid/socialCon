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

Route::get('/redirect', 'SocialAuthGoogleController@redirect');
Route::get('/callback', 'SocialAuthGoogleController@callback');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/settings', 'SettingsController@index');
Route::post('/settings', array(
  'as' => 'settings',
  'uses' => 'SettingsController@update'
));



Route::get('/profile', 'ProfileController@index');
Route::post('/profile', 'ProfileController@uploadProfilePhoto');
// Route::post('/{username}/upload/cover', 'ProfileController@uploadCover');
