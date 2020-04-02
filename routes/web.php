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

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('candidates', 'CandidateController')->parameter('candidates', 'id');
Route::resource('positions', 'PositionController')->parameter('positions', 'id');
Route::resource('sections', 'SectionController')->parameter('sections', 'id');
