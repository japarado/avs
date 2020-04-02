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

// Default Routes
Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Custom Routes
/* Route::group(['middleware' => ['auth']], function() { */
Route::group([], function() {
	Route::group(['middleware' => ['admin.rights']], function() {
		Route::resource('candidates', 'CandidateController');
		Route::resource('positions', 'PositionController');
	});
});
