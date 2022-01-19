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
		Route::prefix('advertisement')->group(function () {
			Route::get('/', 'AdvertisementController@index')->name('advertisement');
			Route::get('/create', 'AdvertisementController@create')->name('createAdvertisement');
			Route::get('/delete/{id}', 'AdvertisementController@delete');
			Route::get('/edit/{id}', 'AdvertisementController@edit');
			Route::post('/store', 'AdvertisementController@store');
			Route::post('/update/{id}', 'AdvertisementController@update');
			Route::get('/get-file/{filename}', function ($filename) {
			    $path = storage_path('ads_file') . '/' . $filename;
			    $file = File::get($path);
			    $type = File::mimeType($path);
			    $response = Response::make($file);
			    $response->header("Content-Type", $type);
			    return $response;
			})->name('getFileAdvertisement');
		});
	});
});

