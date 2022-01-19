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
		Route::prefix('wallet')->group(function () {
			Route::get('/', 'WalletController@index')->name('walletMaster');
			Route::get('/history/{id}', 'WalletController@history')->name('walletHistory');
			Route::get('activate/{id}','WalletController@activateWallet')->name('activateWallet');
			Route::get('deactive/{id}','WalletController@deactiveWallet')->name('deactiveWallet');
			Route::get('delete/{id}','WalletController@deleteWallet')->name('deleteWallet');
		});
	});
});

