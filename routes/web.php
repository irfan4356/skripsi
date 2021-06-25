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
    return view('welcome');
});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
    ]);

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>['auth','checkrole:admin,guru']],function(){
    route::get('/dashboard','DashboardController@index');


    Route::get('/siswa','SiswaController@index')->name('siswa.index');
    route::post('/siswa/tambahData','SiswaController@tambahData')->name('siswa.tambah');
    route::put('/siswa/{id}/update','SiswaController@update')->name('siswa.update');
    route::delete('/siswa/{id}/hapus','SiswaController@hapus')->name('siswa.delete');
    route::get('/siswa/{id}/profile','SiswaController@profile')->name('siswa.profile');
    route::post('/siswa/{id}/addnilai','SiswaController@addnilai');
    route::post('/siswa/{id}/updatenilai','SiswaController@updatenilai');
    route::delete('/siswa/{id}/{idmapel}/deletenilai','SiswaController@deletenilai');

    Route::get('/guru','GuruController@index')->name('guru.index');
    route::post('/guru/tambahData','GuruController@tambahData')->name('guru.tambah');
    route::put('/guru/{id}/update','GuruController@update')->name('guru.update');
    route::delete('/guru/{id}/hapus','GuruController@hapus')->name('guru.delete');
    route::get('/guru/{id}/profile','GuruController@profile')->name('guru.profile');

    Route::get('/kelas','KelasController@index')->name('kelas.index');
    route::post('/kelas/tambahData','KelasController@tambahData')->name('kelas.tambah');
    route::delete('/kelas/{id}/hapus','KelasController@hapus')->name('kelas.delete');
    route::put('/kelas/{id}/update','KelasController@update')->name('kelas.update');
    route::get('/kelas/{id}/show','KelasController@show')->name('kelas.show');

    Route::get('/mapel','MapelController@index')->name('mapel.index');
    route::post('/mapel/tambahData','MapelController@tambahData')->name('mapel.tambah');
    route::delete('/mapel/{id}/hapus','MapelController@hapus')->name('mapel.delete');
    route::put('/mapel/{id}/update','MapelController@update')->name('mapel.update');

    Route::get('/jadwal','JadwalController@index');
    route::resource('/pengumuman','PengumumanController');
});
Route::group(['middleware'=>'auth','checkrole:guru'],function(){

});
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::group(['middleware'=>['auth','checkrole:siswa']],function(){
    route::get('profilsaya','SiswaController@profilsaya');
});
Route::group(['middleware'=>['auth','checkrole:siswa']],function(){
    route::get('nilaisaya','SiswaController@nilaisaya');
});