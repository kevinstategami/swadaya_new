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

Route::get('/', 'HomeController@index');
Route::get('/about-us', 'HomeController@aboutUs');
Route::get('/syarat-keanggotaan', 'HomeController@sk');
Route::get('/set-edit-mode/{editMode}', 'HomeController@setEditMode')->name('setEditMode');

Route::get('/administrator/auth/login', 'Auth\LoginController@login')->name('login');
// Route::get('/register', 'Auth\RegisterController@register')->name('register');
Route::get('/administrator/auth/logout', 'Auth\LoginController@logout')->name('logout');
Route::post('/post-login', 'Auth\LoginController@postLogin');
Route::post('/post-register', 'Auth\RegisterController@postRegister');

Route::get('/profile/{filename}', function ($filename) {
    $path = storage_path('profile_pic') . '/' . $filename;
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file);
    $response->header("Content-Type", $type);
    return $response;
});

Route::get('/images/{filename}', function ($filename) {
    $path = storage_path('picture_file') . '/' . $filename;
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file);
    $response->header("Content-Type", $type);
    return $response;
});

Route::get('/ads/{filename}', function ($filename) {
    $path = storage_path('ads_file') . '/' . $filename;
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file);
    $response->header("Content-Type", $type);
    return $response;
})->name('getAdsFile');

Route::get('/public', function () {
    $path = public_path('/');
    $file = File::get($path);
    $response = Response::make($file);
    $response->header("Content-Type", $type);
    return $response;
});

Route::group(['middleware' => ['auth', 'admin'] ], function () {
    Route::get('/backoffice', 'Backoffice\AdminController@dashboard')->name('backoffice');
});
