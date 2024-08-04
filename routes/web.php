<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'MaharuController@index')->name('progress');
Route::get('/status', 'MaharuController@status')->name('status');
Route::get('/scorecard', "MaharuController@scorecard")->name('scorecard');
// Route::view('/test', 'test');

// Auth::routes(['register'=>false]);

Route::middleware(['auth'])->group(function() {
    Route::get('/penpos', 'PenposController@index')->name('penpos');
    Route::post('/penpos-submit', 'PenposController@submit')->name('penpos-submit');
    Route::post('/penpos-status', 'PenposController@status')->name('penpos-status');
});

Route::get('/home', 'HomeController@index')->name('home');
