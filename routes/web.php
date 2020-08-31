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

Auth::routes();
Route::resource('attractions', 'AttractionController')->middleware('admin');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/visits/create/{id}', 'VisitsController@create')->name('visits.create');
Route::get('/visits/delete/{id}', 'VisitsController@delete')->name('visits.delete');
