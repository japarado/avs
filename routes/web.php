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

Route::get("/", function () {
    return redirect()->route('login');
});

Route::get("/admin", function () {
    return view('admin.login');
});


/*Route::resource('candidates', 'CandidateController')->parameter('candidates', 'id');
Route::resource('sections', 'SectionController')->parameter('sections', 'id');
Route::resource('strands', 'StrandController')->parameter('strands', 'id');*/

Route::get('/prompt', 'Auth\LoginController@prompt')->name('login.prompt');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard/vote', 'DashboardController@index')->name('dashboard.vote');
Route::get('/dashboard', 'DashboardController@instructions')->name('dashboard.instructions');
Route::get('/dashboard/overview', 'DashboardController@overview')->name('dashboard.overview');

Route::middleware(['auth'])->group(function () {

    /*VOTES*/
	Route::middleware(['student'])->prefix('votes')->group(function () {
		Route::get('create', 'VoteController@create');
        Route::get('create/restart', "VoteController@restart");
        Route::get('instructions', 'VoteController@instructions');
        Route::post('create/overview', 'VoteController@overview');
		Route::post('', 'VoteController@store');
    });

	Route::middleware(['admin'])->prefix('superuser')->group(function () {
		Route::get('', 'SuperUserController@index');
		Route::get('registry', 'SuperUserController@registry');


		Route::prefix('candidates')->group(function () {
			Route::delete('/hide/{id}', 'CandidateController@hide');
		});

		Route::prefix('votes')->group(function() {
			Route::get('', 'VoteController@index');
			Route::get('/download-results', 'VoteController@download');
		});

		Route::prefix('users')->group(function(){
			Route::middleware(['pollingstation'])->group(function(){
				Route::put('{id}/update-password', 'PollingStationController@updateAdminPassword');
				Route::put('{id}/update-admin-id', 'PollingStationController@updateAdminId');
			});
		});

		Route::prefix('pollingstations')->group(function(){
			Route::get('auth', 'PollingStationController@authpage');
			Route::post('auth', 'PollingStationController@auth');

			Route::middleware(['pollingstation'])->group(function(){
				Route::get('edit', "PollingStationController@edit");
				Route::put('{id}', 'PollingStationController@update');
			});
		});

		Route::resource('candidates', 'CandidateController')->parameter('candidates', 'id');
		Route::resource('sections', 'SectionController')->parameter('sections', 'id');
		Route::resource('students', 'StudentController')->parameter('students', 'id');
	});
});


Route::prefix('pages')->group(function () {
    Route::get('/logout', 'PageController@logout');
});

Route::fallback(function(){
	return redirect()->route('login');
});

Route::get('/dashboard/logout', 'DashboardController@logout')->name('dashboard.logout');

Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
Route::get('/admin/dashboard/candidates', 'AdminController@candidates')->name('admin.candidates');
Route::get('/admin/dashboard/candidates/add', 'AdminController@candidatesAdd')->name('admin.candidatesAdd');
Route::get('/admin/dashboard/candidates/update', 'AdminController@candidatesUpdate')->name('admin.candidatesUpdate');

Route::get('/admin/dashboard/registry', 'AdminController@registry')->name('admin.registry');
Route::get('/admin/dashboard/registry/student', 'AdminController@registryStudent')->name('admin.registryStudent');
Route::get('/admin/dashboard/registry/student/list', 'AdminController@registryStudentList')->name('admin.registryStudentList');
Route::get('/admin/dashboard/registry/section', 'AdminController@registrySection')->name('admin.registrySection');
Route::get('/admin/dashboard/registry/section/list', 'AdminController@registrySectionList')->name('admin.registrySectionList');

Route::get('/admin/dashboard/results', 'AdminController@results')->name('admin.results');
Route::get('/admin/dashboard/results/doc', 'AdminController@resultsDoc')->name('admin.resultsDoc');

Route::get('/admin/dashboard/settings', 'AdminController@settings')->name('admin.settings');
Route::get('/admin/dashboard/settings/prompt', 'AdminController@settingsPrompt')->name('admin.settingsPrompt');
Route::get('/admin/dashboard/settings/form', 'AdminController@settingsForm')->name('admin.settingsForm');
