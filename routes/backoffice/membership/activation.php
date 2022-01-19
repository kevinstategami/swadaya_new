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
	Route::prefix('backoffice')->group(function () {
		Route::prefix('keanggotaan')->group(function () {
			Route::prefix('activation')->group(function () {
				Route::get('/', 'ActivationMember@index')->name('anggotaActivation');
				Route::get('detail/{id}', 'ActivationMember@getActivationDetail')->name('anggotaActivationDetail');
				Route::get('decline/{id}', 'ActivationMember@declineAnggota')->name('declineAnggota');
				Route::get('activate/{id}', 'ActivationMember@activateMember')->name('anggotaActivite');
			});
		});
	});
});

