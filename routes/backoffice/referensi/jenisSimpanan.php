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
Route::group(['middleware' => ['auth'] ], function () {
	Route::prefix('backoffice/referensi')->group(function () {
		Route::prefix('jenis-simpanan')->group(function () {
			Route::get('/', 'JenisSimpananController@index')->name('jenisSimpanan');
			Route::get('/create', 'JenisSimpananController@create');
			Route::get('/delete/{id}', 'JenisSimpananController@delete');
			Route::get('/edit/{id}', 'JenisSimpananController@edit');
			Route::get('/getIndex', 'JenisSimpananController@getIndex');
			Route::post('/store', 'JenisSimpananController@store');
			Route::post('/update/{id}', 'JenisSimpananController@update');
		});
	});
});

