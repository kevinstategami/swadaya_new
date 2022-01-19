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
			Route::prefix('ketentuan-keanggotaan')->group(function () {
				Route::get('/', 'KetentuanKeanggotaanController@index')->name('ketentuanKeanggotaan');
				Route::get('/create', 'KetentuanKeanggotaanController@create');
				Route::get('/delete/{id}', 'KetentuanKeanggotaanController@delete');
				Route::get('/edit/{id}', 'KetentuanKeanggotaanController@edit');
				Route::get('/getIndex', 'KetentuanKeanggotaanController@getIndex');
				Route::post('/store', 'KetentuanKeanggotaanController@store');
				Route::post('/update/{id}', 'KetentuanKeanggotaanController@update');
			});
		});
	});
});

