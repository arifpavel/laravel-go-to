<?php

use Illuminate\Http\Request;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'user'], function () {
    Route::group(['namespace' => 'admin', 'prefix' => 'admin'], function () {
        Route::get('/{id}', 'UserController@edit');
        Route::post('/{id}', 'UserController@update');
    });
    Route::get('/{id}', 'UserController@editApi')->name('api.user.edit');
    Route::post('/{id}', 'UserController@update')->name('api.user.update');
});

Route::group(['prefix' => 'role'], function () {
    Route::group(['namespace' => 'admin'], function () {
        Route::post('/', 'RoleController@store');
        Route::get('/{id}', 'RoleController@edit');
        Route::post('/{id}', 'RoleController@update');
    });
});

Route::group(['prefix' => 'permission'], function () {
    Route::group(['namespace' => 'admin'], function () {
        Route::post('/', 'PermissionController@store');
        Route::get('/{id}', 'PermissionController@edit');
        Route::post('/{id}', 'PermissionController@update');
    });
});

Route::group(['prefix' => 'settings'], function () {
    Route::group(['namespace' => 'admin'], function () {
        Route::get('/', 'SettingsController@get');
        Route::post('/{settings}', 'SettingsController@update');
    });
});
