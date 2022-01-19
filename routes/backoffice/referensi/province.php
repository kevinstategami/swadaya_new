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
	Route::prefix('backoffice/referensi')->group(function () {
		Route::prefix('provinsi')->group(function () {
			Route::get('/', 'ProvinceController@index')->name('provinsi');
			Route::get('/create', 'ProvinceController@create');
			Route::get('/delete/{id}', 'ProvinceController@delete');
			Route::get('/edit/{id}', 'ProvinceController@edit');
			Route::get('/getIndex', 'ProvinceController@getIndex');
			Route::post('/store', 'ProvinceController@store');
			Route::post('/update/{id}', 'ProvinceController@update');
		});
	});
});

