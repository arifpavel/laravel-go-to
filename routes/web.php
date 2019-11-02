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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'HomeController@getUsers')->name('users');

Route::get('/hello', function () {
    return view('admin.dashboard');
});

/**
 * Adding social login routes
 */
Route::get('login/{provider}', 'SocialLoginController@redirect');
Route::get('login/{provider}/callback','SocialLoginController@Callback');

/**
 * Admin routes.
 */
Route::group(['namespace' => 'Admin','prefix' => 'admin', 'as' => 'admin', 'middleware' => ['web', 'auth:web']],
    function(){
        Route::get('roles', 'UserController@roles')->name('admin.roles');
    }
);