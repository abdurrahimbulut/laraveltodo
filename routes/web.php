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

Route::get('/', 'index@index')->name('anasayfa');
Route::post('/', 'index@islemEkle');
Route::get('/islem/{islem}/{id}', 'islem@index')->name('islem');

