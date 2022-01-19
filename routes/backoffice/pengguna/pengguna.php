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
		Route::prefix('user-pengguna')->group(function () {
			Route::get('/', 'UserPenggunaController@index')->name('userPengguna');
			Route::get('/create', 'UserPenggunaController@create')->name('createUserPengguna');
			Route::get('/delete/{id}', 'UserPenggunaController@delete');
			Route::get('/edit/{id}', 'UserPenggunaController@edit');
			Route::get('/getIndex', 'UserPenggunaController@getIndex');
			Route::post('/store', 'UserPenggunaController@store')->name('storeUserPengguna');
			Route::post('/update/{id}', 'UserPenggunaController@update')->name('updateUserPengguna');
		});
	});
});

