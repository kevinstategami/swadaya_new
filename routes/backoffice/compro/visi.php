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
			Route::prefix('visi')->group(function () {
				Route::get('/', 'VisiController@index')->name('bVisi');
				Route::post('/update/{id}', 'VisiController@update')->name('updateVisi');
			});
		});
	});
});