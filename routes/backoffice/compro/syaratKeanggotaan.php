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
			Route::prefix('syarat-keanggotaan')->group(function () {
				Route::get('/', 'SyaratKeanggotaanController@index')->name('syaratKeanggotaan');
				Route::get('/create', 'SyaratKeanggotaanController@create');
				Route::get('/delete/{id}', 'SyaratKeanggotaanController@delete');
				Route::get('/edit/{id}', 'SyaratKeanggotaanController@edit');
				Route::get('/getIndex', 'SyaratKeanggotaanController@getIndex');
				Route::post('/store', 'SyaratKeanggotaanController@store');
				Route::post('/update/{id}', 'SyaratKeanggotaanController@update');
			});
		});
	});
});

