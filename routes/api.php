<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::group(['prefix' => 'v1'], function () {
    Route::get('getmhs', 'ApiController@getMhs');
    Route::get('getpengumuman', 'ApiController@getPengumuman');
    Route::get('getevent', 'ApiController@getEvent');
    Route::get('getevent/{id}', 'ApiController@detailEvent');

    Route::get('getprestasi', 'ApiController@getPrestasi');


});


