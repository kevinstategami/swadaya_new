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
		Route::prefix('introduction-about-us')->group(function () {
			Route::get('/', 'IntroductionAUController@index')->name('cmsIntroduction');
			Route::post('/update', 'IntroductionAUController@update')->name('updateCmsIntroduction');
		});
	});
});

