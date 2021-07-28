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

Route::get('/', function () {
    return view('admin.dashboard');
});
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
    // Route::group(['middleware' => 'auth:admin'], function () {

        Route::view('dashboard', 'admin.dashboard')->name('dashboard');
        Route::resource('card', 'CardOneController');
        // Route::resource('C', 'CardTwoController');
        
    // });
});
// Route::view('login', 'auth.login');

// Route::group(['middleware' => 'auth:admin'], function () {
    
//     Route::view('dashboard', 'dashboard');
// });