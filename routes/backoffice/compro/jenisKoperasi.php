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
Route::group(['middleware' => ['auth', 'admin'] ], function () {
	Route::prefix('backoffice')->group(function () {
		Route::prefix('konfigurasi')->group(function () {
			Route::prefix('jenis-koperasi')->group(function () {
				Route::get('/', 'JenisKoperasiController@index')->name('jenisKoperasi');
				Route::get('/create', 'JenisKoperasiController@create');
				Route::get('/delete/{id}', 'JenisKoperasiController@delete');
				Route::get('/edit/{id}', 'JenisKoperasiController@edit');
				Route::get('/getIndex', 'JenisKoperasiController@getIndex');
				Route::post('/store', 'JenisKoperasiController@store');
				Route::post('/update/{id}', 'JenisKoperasiController@update');
			});
		});
	});
});

