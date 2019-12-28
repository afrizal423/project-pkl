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

    Route::resource("admin/user", "UserManage");


    //Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('admin/mahasiswa/lihat', 'MahasiswaController@lihat');
    Route::get('admin/mahasiswa/cr', 'MahasiswaController@cr')->name('mahasiswa.cr');
    Route::get('admin/mahasiswa/cri', 'MahasiswaController@search')->name('mahasiswa.sc');

    Route::get('admin/mahasiswa/cari', 'MahasiswaController@cari')->name('mahasiswa.cari');
    Route::resource("admin/mahasiswa", "MahasiswaController");
    Route::get('admin/pengumuman/cri', 'PengumumanController@search')->name('pengumuman.sc');
    Route::get('admin/pengumuman/cri2', 'PengumumanController@search2')->name('pengumuman.sr');

    Route::get("admin/pengumuman/manage", "PengumumanController@manage");
    Route::resource("admin/pengumuman", "PengumumanController");

    Route::get('admin/event/manage', 'EventController@manage');
    Route::resource("admin/event", "EventController");
    Route::get('admin/ta/cri', 'TugasakhirController@search')->name('ta.sr');

    Route::resource("admin/ta", "TugasakhirController");
    Route::get('admin/alumni/cri', 'AlumniController@search')->name('al.sr');

    Route::resource("admin/alumni", "AlumniController");
    Route::get('admin/prestasi/cri', 'PrestasiController@search')->name('pr.sr');

    Route::resource("admin/prestasi", "PrestasiController");
    Route::get('admin/pkl/cri', 'PklController@search')->name('pkl.sr');

    Route::resource("admin/pkl", "PklController");
    Route::resource("admin/ormawa", "OrmawaController");
});


