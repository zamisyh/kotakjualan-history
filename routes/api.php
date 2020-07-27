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

Route::group(['prefix' => 'v1'], function () {
    Route::name('api.')->group(function() {

        Route::post('auth/login', 'Api\AuthController@login');

        //With Middleware
        Route::group(['middleware' => 'auth:api'], function () {
            Route::get('history/anggota/{id}', 'Api\HistoryController@historyGetIdAnggota')->name('history.ger');
            Route::post('history/post', 'Api\HistoryController@historyPost')->name('history.post');
            Route::put('history/keyword/{id}', 'Api\HistoryController@updateKeyword')->name('history.keyword');
        });
    });
});
