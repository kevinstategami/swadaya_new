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
		Route::prefix('kota')->group(function () {
			Route::get('/', 'CityController@index')->name('kota');
			Route::get('/create', 'CityController@create');
			Route::get('/delete/{id}', 'CityController@delete');
			Route::get('/edit/{id}', 'CityController@edit');
			Route::get('/getIndex', 'CityController@getIndex');
			Route::post('/store', 'CityController@store');
			Route::post('/update/{id}', 'CityController@update');
		});
	});
});

