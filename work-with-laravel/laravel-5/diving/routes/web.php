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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('barang', 'BarangController@index');
Route::resource('/barang', 'BarangController');
Route::resource('/transaksi', 'TransaksiController');
Route::get('/getData/{nota}', 'TransaksiController@getdetail');
Route::get('/simpandetail', 'TransaksiController@simpandetail');
Route::get('/showdet', 'TransaksiController@showdet');
Route::get('/cetak-nota/{notatrans}', 'TransaksiController@cetaknotaku');