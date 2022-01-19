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
	Route::prefix('backoffice/transaction')->group(function () {
		Route::prefix('invoice')->group(function () {
			Route::get('/', 'InvoiceController@index')->name('invoiceMaster');
			Route::get('approved/{id}','InvoiceController@approvedInvoice')->name('approvedInvoice');
			Route::get('decline/{id}','InvoiceController@declineInvoice')->name('declineInvoice');
			Route::get('delete/{id}','InvoiceController@deleteInvoice')->name('deleteInvoice');
			Route::get('image/{id}','InvoiceController@getImage')->name('getImage');
		});
	});
});

