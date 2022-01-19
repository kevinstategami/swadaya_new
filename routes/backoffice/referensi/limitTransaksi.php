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
		Route::prefix('limit-transaksi')->group(function () {
			Route::get('/', 'TransactionLimitController@index')->name('limitTransaksi');
			Route::get('/create', 'TransactionLimitController@create');
			Route::get('/delete/{id}', 'TransactionLimitController@delete');
			Route::get('/edit/{id}', 'TransactionLimitController@edit');
			Route::get('/getIndex', 'TransactionLimitController@getIndex');
			Route::post('/store', 'TransactionLimitController@store');
			Route::post('/update/{id}', 'TransactionLimitController@update');
		});
	});
});

