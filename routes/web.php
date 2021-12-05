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

Route::get('/', 'App\Http\Controllers\AlbumsController@index');
Route::get('/albums', 'App\Http\Controllers\AlbumsController@index')->name('album-index');
Route::get('/albums/create', 'App\Http\Controllers\AlbumsController@create')->name('album-create');
Route::post('/albums/store', 'App\Http\Controllers\AlbumsController@store')->name('album-store');
Route::get('albums/{id}', 'App\Http\Controllers\AlbumsController@show')->name('album-show');

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/photos/create/{albumId}', 'App\Http\Controllers\PhotosController@create')->name('photo-create');
Route::post('/photos/store', 'App\Http\Controllers\PhotosController@store')->name('photo-store');
Route::get('/photos/{id}', 'App\Http\Controllers\PhotosController@show')->name('photo-show');
Route::delete('/photos/{id}', 'App\Http\Controllers\PhotosController@destroy')->name('photo-destroy');