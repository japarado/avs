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

Route::get("/", function() {
	return redirect()->route('login');
});

Auth::routes();

Route::resource('candidates', 'CandidateController')->parameter('candidates', 'id');
Route::resource('sections', 'SectionController')->parameter('sections', 'id');
Route::resource('strands', 'StrandController')->parameter('strands', 'id');

Route::get('/prompt', 'Auth\LoginController@prompt')->name('login.prompt');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard/vote', 'DashboardController@index')->name('dashboard.vote');
Route::get('/dashboard', 'DashboardController@instructions')->name('dashboard.instructions');
Route::get('/dashboard/overview', 'DashboardController@overview')->name('dashboard.overview');
Route::get('/dashboard/logout', 'DashboardController@logout')->name('dashboard.logout');
