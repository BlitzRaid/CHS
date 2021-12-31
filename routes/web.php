<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
Route::get('/contacts/delete/{id}', 'App\Http\Controllers\ContactsController@delete')->name('delete');
Route::post('/edit', 'App\Http\Controllers\ContactsController@edit')->name('edit');
Route::post('/store', 'App\Http\Controllers\ContactsController@store')->name('store.prof');
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::get('/email/{id}', [ContactController::class, 'index'])->name('emailForm');
Route::post('/send', 'App\Http\Controllers\ContactController@send')->name('send.email');
Route::get('/calc', 'App\Http\Controllers\CalcController@index')->name('calc');
Route::get('/timetable', 'App\Http\Controllers\TimetableController@index')->name('timetable');





