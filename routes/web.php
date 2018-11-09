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
 
Auth::routes(); 

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['prefix'=>'/','middleware'=>['auth','role:admin|member']], function(){
	// Jenis Buku
Route::resource('jenis', 'JnbukuController');
Route::get('jn_json', 'JnbukuController@json');
Route::get('deljn', 'JnbukuController@removedata')->name('deljn');
Route::post('add_jn', 'JnbukuController@store');
Route::get('editjn/{id}', 'JnbukuController@edit');
Route::post('jn/edit/{id}', 'JnbukuController@update');
	// Anggota
Route::resource('anggota', 'AnggotaController');
Route::get('agt_json', 'AnggotaController@json');
Route::post('add_agt', 'AnggotaController@store');
Route::get('editagt/{id}', 'AnggotaController@edit');
Route::post('agt/edit/{id}', 'AnggotaController@update');
Route::get('delagt', 'AnggotaController@destroy')->name('delagt');
	// Buku
Route::resource('buku', 'BukuController');
Route::get('buk_json', 'BukuController@json');
Route::post('add_buk', 'BukuController@store');
Route::get('editbuk/{id}', 'BukuController@edit');
Route::post('buk/edit/{id}', 'BukuController@update');
Route::get('delbuk', 'BukuController@destroy')->name('delbuk');
	//Peminjaman
Route::resource('pinjam', 'PinjamkblController');
Route::get('pin_json', 'PinjamkblController@json');
Route::post('add_pin', 'PinjamkblController@store');
Route::get('editpin/{id}', 'PinjamkblController@edit');
Route::post('pin/edit/{id}', 'PinjamkblController@update');
	//Pengembalian
Route::resource('pengembalian', 'PengembalianController');
Route::get('pen_json', 'PengembalianController@json');
Route::get('myform/ajax/{id}','PengembalianController@ajax');
Route::post('add_pen', 'PengembalianController@store');
Route::post('/kembali/edit/{id}', 'PengembalianController@update');
Route::get('kembali/getedit/{id}', 'PengembalianController@edit');
	//Add-Ons
Route::get('downloadExcel/{type}', 'PinjamkblController@downloadExcel');
});