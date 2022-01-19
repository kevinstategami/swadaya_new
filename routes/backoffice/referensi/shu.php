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
		Route::prefix('shu')->group(function () {
			Route::get('/', 'ShuController@index')->name('SHU');
			Route::get('/create', 'ShuController@create');
			Route::get('/delete/{id}', 'ShuController@delete');
			Route::get('/edit/{id}', 'ShuController@edit');
			Route::get('/getIndex', 'ShuController@getIndex');
			Route::post('/store', 'ShuController@store');
			Route::post('/update/{id}', 'ShuController@update');
		});
	});
});

