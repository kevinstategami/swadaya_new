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
		Route::prefix('document-type')->group(function () {
			Route::get('/', 'DocumentTypeController@index')->name('documentType');
			Route::get('/create', 'DocumentTypeController@create')->name('createDocumentType');
			Route::get('/delete/{id}', 'DocumentTypeController@delete');
			Route::get('/edit/{id}', 'DocumentTypeController@edit');
			Route::get('/getIndex', 'DocumentTypeController@getIndex');
			Route::post('/store', 'DocumentTypeController@store');
			Route::post('/update/{id}', 'DocumentTypeController@update');
		});
	});
});

