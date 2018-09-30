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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home','HomeController@index');

Route::get('{username}', 'UsersController@show');

Route::post('{username}/about/edit', 'UsersController@editAbout');

Route::post('{username}/socials', 'SocialLinkController@store');
Route::delete('{username}/socials/{id}', 'SocialLinkController@destroy');

Route::post('{username}/panels', 'PanelController@store');
Route::patch('{username}/panels/{id}','PanelController@update');
Route::delete('{username}/panels/{id}', 'PanelController@destroy');

Route::post('{username}/projects','ProjectController@store');
Route::patch('{username}/projects/{id}', 'ProjectController@update');
Route::delete('{username}/projects/{id}', 'ProjectController@destroy');

Route::patch('{username}/settings/password','UsersController@changePassword');
Route::patch('{username}/settings/username','UsersController@changeUsername');

