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
		Route::prefix('penarikan')->group(function () {
			Route::get('/', 'PenarikanController@index')->name('penarikanMaster');
			Route::get('approved/{id}','PenarikanController@approvedPenarikan')->name('approvedPenarikan');
			Route::get('decline/{id}','PenarikanController@declinePenarikan')->name('declinePenarikan');
			Route::get('delete/{id}','PenarikanController@deletePenarikan')->name('deletePenarikan');
		});
	});
});

