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


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contacts', 'App\Http\Controllers\ContactsController@search')->name('web.search');
Route::post('/store', 'App\Http\Controllers\ContactsController@store')->name('store.prof');
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/email', 'App\Http\Controllers\ContactController@index')->name('emailForm');
Route::post('/send', 'App\Http\Controllers\ContactController@send')->name('send.email');
Route::get('/calc', 'App\Http\Controllers\CalcController@index');
Route::get('/timetable', 'App\Http\Controllers\TimetableController@index');






