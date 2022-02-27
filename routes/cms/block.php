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
Route::group(['middleware' => ['auth'] ], function () {
	Route::prefix('cms')->group(function () {
		Route::prefix('block')->group(function () {
			// Route::get('/get', 'BlockController@index')->name('cmsBlockGet');
			Route::get('/{id}', 'BlockController@getById')->name('cmsBlockGetById');
			Route::get('delete/{id}', 'BlockController@delete')->name('cmsBlockDelete');
			Route::get('delete-index-value/{index}/{id}', 'BlockController@deleteIndexValue')->name('cmsBlockDeleteIndexValue');
			Route::post('/create', 'BlockController@create')->name('createCmsBlock');
			Route::post('/update', 'BlockController@update')->name('updateCmsBlock');
			Route::post('/upload-file', 'BlockController@uploadFile')->name('updateFileCmsBlock');

			Route::post('/addIndexValue', 'BlockController@addIndexValue')->name('addValueCmsBlock');
			
			// CC
			Route::get('edit-cc/{id}', 'BlockController@editCc');
			Route::get('edit-lc/{id}', 'BlockController@editLc');
		});
	});
});
Route::get('/get-block-image/{filename}', function ($filename) {
    $path = storage_path('cms_file') . '/' . $filename;
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file);
    $response->header("Content-Type", $type);
    return $response;
})->name('cmsBlockGetImage');