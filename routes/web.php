<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
        Route::view('login', 'admin.auth.login')->name('login');
        Route::post('login', 'AuthController@login')->name('login');
        Route::get('logout', 'AuthController@logout')->name('logout')->middleware('auth:admin');
        Route::group(['middleware' => 'auth:admin'], function () {
            Route::view('dashboard', 'admin.dashboard')->name('dashboard');
            Route::resource('cardOne', 'CardOneController');
            Route::resource('cardTwo', 'CardTwoController');
            Route::resource('profile', 'AdminController');
            Route::resource('user', 'UserController');
            Route::view('notification','admin.notification.index')->name('notification.index');
            Route::post('notification','NotificationController@send')->name('notification.send');
        });
    }); 
});
// Route::view('login', 'auth.login');

// Route::group(['middleware' => 'auth:admin'], function () {
    
//     Route::view('dashboard', 'dashboard');
// });