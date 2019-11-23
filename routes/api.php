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
    Route::get('getmhs/{id}', 'ApiController@detailMhs');

    Route::get('getpengumuman', 'ApiController@getPengumuman');
    Route::get('getpengumuman/{id}', 'ApiController@detailPengumuman');

    Route::get('getevent', 'ApiController@getEvent');
    Route::get('getevent/{id}', 'ApiController@detailEvent');

    Route::get('getprestasi', 'ApiController@getPrestasi');
    Route::get('getprestasi/{id}', 'ApiController@detailPrestasi');

    Route::get('getpkl', 'ApiController@getPkl');
    Route::get('getpkl/{id}', 'ApiController@detailPkl');

    Route::get('getta', 'ApiController@getTugasakhir');
    Route::get('getta/{id}', 'ApiController@detailTugasakhir');

    Route::get('getalumni', 'ApiController@getAlumni');
    Route::get('getalumni/{id}', 'ApiController@detailAlumni');


});


