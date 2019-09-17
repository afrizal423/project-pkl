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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return view('welcome');
});
Route::group(['middleware' => ['web']], function () {
    Auth::routes();

    Route::match(['get', 'post'], '/register', function () {
        return redirect("/login");
    });
    Route::get('admin/profile/', 'profiladmin@index');

    //Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('admin/mahasiswa/lihat', 'MahasiswaController@lihat');
    Route::resource("admin/mahasiswa", "MahasiswaController");

    Route::get("admin/pengumuman/manage", "PengumumanController@manage");
    Route::resource("admin/pengumuman", "PengumumanController");

    Route::get('admin/event/manage', 'EventController@manage');
    Route::resource("admin/event", "EventController");

    Route::resource("admin/ta", "TugasakhirController");
    Route::resource("admin/alumni", "AlumniController");
    Route::resource("admin/prestasi", "PrestasiController");
    Route::resource("admin/pkl", "PklController");
    Route::resource("admin/ormawa", "OrmawaController");
});


