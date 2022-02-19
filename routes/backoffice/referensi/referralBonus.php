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
		Route::prefix('referral-bonus')->group(function () {
			Route::get('/', 'ReferralBonusController@index')->name('referralBonus');
			Route::get('/create', 'ReferralBonusController@create');
			Route::get('/delete/{id}', 'ReferralBonusController@delete');
			Route::get('/edit/{id}', 'ReferralBonusController@edit');
			Route::get('/getIndex', 'ReferralBonusController@getIndex');
			Route::post('/store', 'ReferralBonusController@store');
			Route::post('/update/{id}', 'ReferralBonusController@update');
			Route::get('/activate/{id}', 'ReferralBonusController@activate');
			Route::get('/deactivate/{id}', 'ReferralBonusController@deactivate');
		});
	});
});

