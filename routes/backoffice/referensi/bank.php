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
		Route::prefix('bank')->group(function () {
			Route::get('/', 'BankController@index')->name('bank');
			Route::get('/create', 'BankController@create');
			Route::get('/delete/{id}', 'BankController@delete');
			Route::get('/edit/{id}', 'BankController@edit');
			Route::get('/getIndex', 'BankController@getIndex');
			Route::post('/store', 'BankController@store');
			Route::post('/update/{id}', 'BankController@update');
		});
	});
});

