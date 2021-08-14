<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::any('user/register','Api\UserController@register');
    Route::any('user/login','Api\UserController@login');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::any('user/edit','Api\UserController@edit');
        Route::any('user/update','Api\UserController@update');
        Route::any('cards','Api\CardController@index');
    });
});
