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
			Route::prefix('keuntungan-anggota')->group(function () {
				Route::get('/', 'KeuntunganAnggotaController@index')->name('keuntunganAnggota');
				Route::get('/create', 'KeuntunganAnggotaController@create');
				Route::get('/delete/{id}', 'KeuntunganAnggotaController@delete');
				Route::get('/edit/{id}', 'KeuntunganAnggotaController@edit');
				Route::get('/getIndex', 'KeuntunganAnggotaController@getIndex');
				Route::post('/store', 'KeuntunganAnggotaController@store');
				Route::post('/update/{id}', 'KeuntunganAnggotaController@update');
			});
		});
	});
});

