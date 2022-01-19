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
		Route::prefix('keanggotaan')->group(function () {
			Route::prefix('anggota')->group(function () {
				Route::get('/', 'DataAnggotaController@index')->name('anggota');
				Route::get('downline/{id}', 'DataAnggotaController@downlineAnggota')->name('downlineAnggota');
				Route::get('downline/delete/{id}', 'DataAnggotaController@deleteDownline')->name('deleteDownline');
				Route::get('create', 'DataAnggotaController@createAnggota')->name('createAnggota');
				Route::post('save', 'DataAnggotaController@saveAnggota')->name('saveAnggota');
				Route::get('edit/{id}', 'DataAnggotaController@editAnggota')->name('editAnggota');
				Route::get('delete/{id}', 'DataAnggotaController@deleteAnggota')->name('deleteAnggota');
				Route::post('/update/{id}', 'DataAnggotaController@updateAnggota')->name('updateAnggota');
			});
		});
	});
});

