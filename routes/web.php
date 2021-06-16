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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/siswa','SiswaController@index')->name('siswa.index');
route::post('/siswa/tambahData','SiswaController@tambahData')->name('siswa.tambah');
route::put('/siswa/{id}/update','SiswaController@update')->name('siswa.update');
route::delete('/siswa/{id}/hapus','SiswaController@hapus')->name('siswa.delete');
route::get('/siswa/{id}/profile','SiswaController@profile')->name('siswa.profile');
route::get('/siswa/{id}/nilai','SiswaController@nilai')->name('siswa.nilai');

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