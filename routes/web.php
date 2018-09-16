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

Route::post('{username}/social/add', 'SocialLinkController@add');
Route::delete('{username}/social/{id}', 'SocialLinkController@remove');

Route::post('{username}/panel/add', 'PanelController@add');
Route::delete('{username}/panel/{id}', 'PanelController@delete');