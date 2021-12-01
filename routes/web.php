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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
