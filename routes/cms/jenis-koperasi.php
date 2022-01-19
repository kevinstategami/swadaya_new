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
	Route::prefix('cms')->group(function () {
		Route::prefix('jenis-koperasi')->group(function () {
			Route::get('/', 'JenisKoperasiController@index')->name('cmsJenisKoperasi');
			Route::post('/update', 'JenisKoperasiController@update')->name('updateCmsJenisKoperasi');
		});
	});
});

