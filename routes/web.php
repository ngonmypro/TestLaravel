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

// Manage Data User
Route::resource('/user', 'UsersController');

// Search
Route::get('/search', 'SearchController@search')->name('user.search');
Route::get('/action', 'SearchController@action')->name('user.action');

// Upload 1 file
Route::get('/upload', 'UploadController@index')->name('upload.index');
Route::post('/uploadfile', 'UploadController@upload');

// export PDF
Route::get('/downloadPDF/{id}', 'UsersController@downloadPDF');

// DataTables
Route::get('/index', 'DisplayController@index');
Route::get('/create', 'DisplayController@create')->name('create.create');

// Auto Complete
Route::get('/auto', 'AutoCompleteController@index')->name('auto.index');
Route::post('/auto', 'AutoCompleteController@show')->name('autocomplete.show');

// Relation
Route::get('/product', 'ProductController@index')->name('product.index');
Route::resource('/product', 'ProductController');

// Multiple Upload File
Route::get('/multipleupload', 'MultipleController@index')->name('multipleupload.index');
Route::post('/multipleupload', 'MultipleController@upload')->name('image.upload');

// Upload Image Croppie
Route::get('/cropimage', 'CropController@index')->name('cropimage.index');
Route::post('/cropimage', 'CropController@cropImage')->name('cropimage');
