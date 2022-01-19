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
		Route::prefix('invoice-history')->group(function () {
			Route::get('/', 'InvoiceHistoryController@index')->name('invoiceHistoryMaster');
			Route::get('approved/{id}','InvoiceHistoryController@approvedInvoice')->name('approvedInvoiceHistory');
			Route::get('decline/{id}','InvoiceHistoryController@declineInvoice')->name('declineInvoiceHistory');
			Route::get('delete/{id}','InvoiceHistoryController@deleteInvoice')->name('deleteInvoiceHistory');
			Route::get('image/{id}','InvoiceHistoryController@getImage')->name('getImageHistory');
		});
	});
});

