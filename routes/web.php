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



Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home','HomeController@index');
Route::get('{username}/preview', function($username, Illuminate\Http\Request $request){
    $user = App\User::findByUsernameOrFail($username);
    $request->session()->flash('preview', 'on');
    return view('user.page', compact('user'));
});

Route::middleware(['CheckIfAdmin'])->group(function () {

    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/users', 'AdminController@users');
    Route::get('/admin/users/create', 'AdminController@create');
    Route::get('/admin/users/{user}/edit','AdminController@editUser');
    Route::post('/admin/users/','AdminController@store');
    Route::patch('/admin/users/{user}','AdminController@updateUser');
    Route::delete('/admin/users/{user}', 'AdminController@deleteUser');
});



Route::get('{username}', 'UsersController@show');


Route::middleware('throttle:10,1')->group(function () {
    Route::post('{username}/about/edit', 'UsersController@editAbout');
});

Route::middleware('throttle:20,1')->group(function () {
    Route::post('{username}/socials', 'SocialLinkController@store');
    Route::delete('{username}/socials/{id}', 'SocialLinkController@destroy');
});

Route::middleware('throttle:20,1')->group(function () {
    Route::post('{username}/panels', 'PanelController@store');
    Route::patch('{username}/panels/{id}','PanelController@update');
    Route::delete('{username}/panels/{id}', 'PanelController@destroy');
});


Route::middleware('throttle:20,1')->group(function () {
    Route::post('{username}/projects','ProjectController@store');
    Route::patch('{username}/projects/{id}', 'ProjectController@update');
    Route::delete('{username}/projects/{id}', 'ProjectController@destroy');
});


Route::middleware('throttle:6,1')->group(function () {
    Route::patch('{username}/settings/password','UsersController@changePassword');
    Route::patch('{username}/settings/username','UsersController@changeUsername');
});




