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

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

Route::resource('pakets','PaketController')->middleware('auth','checkRole:admin');
Route::resource('customers','CustomerController')->middleware('auth','checkRole:admin');
Route::resource('pesanans','PesananController')->middleware('auth','checkRole:kasir');
Route::resource('pembayarans','PembayaranController')->middleware('auth','checkRole:kasir');
Route::resource('karyawans','KaryawanController')->middleware('auth','checkRole:admin');
Route::resource('transactions','TransactionController')->middleware('auth','checkRole:kasir');
Route::get('/laporans','LaporanController@index')->name('laporans')->middleware('auth','checkRole:manager');
Route::get('/laporans/cari','LaporanController@cari');
Route::get('/laporans/print','LaporanController@print')->name('laporans.print');
Route::get('/laporans/show','LaporanController@show')->name('laporans.show');

Route::get('/dashboard','DashboardController@index')->middleware('auth','checkRole:admin,kasir,manager');
Route::get('/daftarcustomer','DaftarcustomerController@index');
Route::post('/daftarcustomer/create','DaftarcustomerController@create');

Route::get('/melaundry','MelaundryController@index');
Route::post('/melaundry/create','MelaundryController@create');