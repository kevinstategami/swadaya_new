<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['auth'] ], function () {
	Route::prefix('membership/index')->group(function () {

		Route::get('home', 'HomeController@index')->name('index');
		Route::get('aktivasi/{userId}', 'RegistrasiController@formAktivasi')->name('formAktivasi');
		Route::get('uploadBukti/{tagihanId}', 'RegistrasiController@uploadBukti')->name('uploadBukti');
		Route::post('storeBukti', 'RegistrasiController@storeBukti')->name('storeBukti');
		Route::post('storeAktivasi', 'RegistrasiController@storeAktivasi')->name('storeAktivasi');

		Route::get('activity', 'HomeController@activity')->name('activity');
		Route::get('activity-detail/{invoiceId}', 'HomeController@detailActivity')->name('detailActivity');

		Route::get('detail-simpanan', 'HomeController@detailSimpanan')->name('detailSimpanan');

		Route::get('history-wallet', 'HomeController@historyWallet')->name('historyWallet');

		Route::get('tarik-saldo', 'HomeController@callRequestForm')->name('requestFund');
		Route::post('tarik-saldo-store', 'RegistrasiController@tarikSaldo')->name('tarikSaldo');

		Route::get('transfer-saldo', 'HomeController@callTransferForm')->name('transferFund');

		Route::get('akun', 'HomeController@indexAkun')->name('indexAkun');

		Route::get('change-password', 'HomeController@changePassword')->name('changePassword');
		Route::post('storeChangePassword', 'HomeController@storeChangePassword')->name('storeChangePassword');
		Route::get('change-password/check/{password}', 'HomeController@checkChangePassword')->name('checkChangePassword');

		Route::get('profil', 'HomeController@profil')->name('profil');
		Route::post('storeChangeProfile', 'HomeController@storeChangeProfile')->name('storeChangeProfile');


	});
});
