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
Route::resource('/product', 'ProductController');
Route::get('/transaction', 'TransactionController@tambahtran');
Route::get('/tampiltrans', 'TransactionController@recordtrans');
Route::get('/tampildet', 'TransactionController@recorddet');
Route::post('simpandetail', 'TransactionController@simpandetail');
Route::get('/getData/{nota}', 'TransactionController@getdetail');
Route::post('simpantrans', 'TransactionController@simpantrans');
Route::get('/cetak-nota/{notatrans}', 'TransactionController@cetaknotaku');
Route::post('hapusdetail', 'TransactionController@deletedetail');
Route::get('/user', function () {
    return view('user.index');
});