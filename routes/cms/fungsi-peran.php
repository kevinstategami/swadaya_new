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
	Route::prefix('cms')->group(function () {
		Route::prefix('fungsi-peran')->group(function () {
			Route::get('/', 'FungsiPeranController@index')->name('cmsFungsiPeran');
			Route::get('/image-about-us', 'FungsiPeranController@indexImgAu')->name('cmsImgAu');
			Route::post('/update', 'FungsiPeranController@update')->name('updateCmsFungsiPeran');
			Route::post('/update-image-about-us', 'FungsiPeranController@updateImgAu')->name('updateCmsImgAu');
		});
	});
});

