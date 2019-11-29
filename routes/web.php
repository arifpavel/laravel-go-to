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
Route::get('login/{provider}/callback','SocialLoginController@Callback')->middleware('checkuserstatus');

/**
 * Admin routes.
 */
Route::group(['namespace' => 'Admin','prefix' => 'admin', 'as' => 'admin', 'middleware' => ['auth','web', 'auth:web', 'role:superadmin|admin|editor|manager|stuff']],
    function(){
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');

        //users datatable routes.
        Route::resource('users', 'UserController');
        Route::get('users/block/{id}', 'UserController@blockUnblock');
        Route::resource('roles', 'RoleController');
        Route::resource('permissions', 'PermissionController');
        Route::get('/settings', 'SettingsController@index')->name('admin.settings');
    }
);

/**
 * User routes.
 */
Route::group(['prefix' => 'user'], function () {
    Route::get('/{username}', 'UserController@show')->name('user.show');
    Route::get('/edit/{id}', 'UserController@edit')->name('user.edit')->middleware('auth');
});
