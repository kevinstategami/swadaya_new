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
		Route::prefix('payment-method')->group(function () {
			Route::get('/', 'PaymentMethodController@index')->name('paymentMethod');
			Route::get('/create', 'PaymentMethodController@create');
			Route::get('/delete/{id}', 'PaymentMethodController@delete');
			Route::get('/edit/{id}', 'PaymentMethodController@edit');
			Route::get('/getIndex', 'PaymentMethodController@getIndex');
			Route::post('/store', 'PaymentMethodController@store');
			Route::post('/update/{id}', 'PaymentMethodController@update');
		});
	});
});

