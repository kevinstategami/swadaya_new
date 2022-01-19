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
			Route::prefix('misi')->group(function () {
				Route::get('/', 'MisiController@index')->name('misi');
				Route::get('/create', 'MisiController@create')->name('createMisi');
				Route::get('/delete/{id}', 'MisiController@delete')->name('deleteMisi');
				Route::get('/edit/{id}', 'MisiController@edit')->name('editMisi');
				Route::post('/store', 'MisiController@store')->name('postMisi');
				Route::post('/update/{id}', 'MisiController@update')->name('updateMisi');
			});
		});
	});
});

