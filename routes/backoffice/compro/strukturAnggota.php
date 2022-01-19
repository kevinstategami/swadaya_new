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
			Route::prefix('struktur-anggota')->group(function () {
				Route::get('/', 'StrukturAnggotaController@index')->name('strukturAnggota');
				Route::get('/create', 'StrukturAnggotaController@create');
				Route::get('/delete/{id}', 'StrukturAnggotaController@delete');
				Route::get('/edit/{id}', 'StrukturAnggotaController@edit');
				Route::get('/getIndex', 'StrukturAnggotaController@getIndex');
				Route::post('/store', 'StrukturAnggotaController@store');
				Route::post('/update/{id}', 'StrukturAnggotaController@update');
			});
		});
	});
});
