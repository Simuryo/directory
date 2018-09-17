<?php

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
    return view('home');
});

	Route::get('/home', 'HomeController@index')->name('home');

/*
 * Login Route
 * ------------------------------------------------------------------------------------------------------------------
 */
		Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
		Route::post('/login', 'Auth\LoginController@login')->name('login');

/*
 * Logout Route
 * ------------------------------------------------------------------------------------------------------------------
 */
		Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

/*
 * Password Route
 * ------------------------------------------------------------------------------------------------------------------
 */
		Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
		Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
		Route::post('/password/reset', 'Auth\ForgotPasswordController@reset')->name('password.update');
		Route::get('/password/reset/{token}', 'Auth\ForgotPasswordController@showResetForm')->name('password.reset');

/*
 * Registration Route
 * ------------------------------------------------------------------------------------------------------------------
 */
		Route::group(['middleware' => ['auth']], function () {
		    
		    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
		    Route::post('/register', 'Auth\RegisterController@register');

		    // Profile Entries Route
		    Route::post('/profile', 'ProfileController@store')->name('profile.store');
		    Route::get('/profile/{entry}/edit', 'ProfileController@edit')->name('profile.edit');
		    Route::put('/profile/{entry}', 'ProfileController@update')->name('profile.update');
		    Route::get('/profile/{entry}/delete', 'ProfileController@delete')->name('profile.delete');
		    Route::delete('/profile/{entry}', 'ProfileController@destroy')->name('profile.destroy');

		  	// Services Route
				Route::get('/services/create', 'ServicesController@create')->name('services.create');
				Route::post('/services', 'ServicesController@store')->name('services.store');
				Route::get('/services/{service}/edit', 'ServicesController@edit')->name('services.edit');
				Route::put('/services/{service}', 'ServicesController@update')->name('services.update');

				// Section Route
				Route::get('/services/{service}/sections/create', 'SectionsController@create')->name('sections.create');
				Route::post('/services/{service}/sections', 'SectionsController@store')->name('sections.store');
				Route::get('/services/{service}/sections/{section}/edit', 'SectionsController@edit')->name('sections.edit');
				Route::put('/services/{service}/sections/{section}', 'SectionsController@update')->name('sections.update');

				// Contacts Route
				Route::get('/services/{service}/contacts/create', 'ContactsController@create')->name('contacts.create');
				Route::post('/services/{service}/contacts', 'ContactsController@store')->name('contacts.store');
				Route::get('/services/{service}/contacts/edit', 'ContactsController@edit')->name('contacts.edit');
				Route::put('/services/{service}/contacts', 'ContactsController@update')->name('contacts.update');

				// Clinic Route
				Route::get('/clinics/create', 'ClinicsController@create')->name('clinics.create');
				Route::post('/clinics', 'ClinicsController@store')->name('clinics.store');
				Route::get('/clinics/{clinic}/edit', 'ClinicsController@edit')->name('clinics.edit');
				Route::put('/clinics/{clinic}', 'ClinicsController@update')->name('clinics.update');

				// Clinic Section Route
				Route::get('/clinics/{clinic}/sections/create', 'ClinicSectionsController@create')->name('clinics.sections.create');
				Route::post('/clinics/{clinic}/sections', 'ClinicSectionsController@store')->name('clinics.sections.store');
				Route::get('/clinics/{clinic}/sections/{section}/edit', 'ClinicSectionsController@edit')->name('clinics.sections.edit');
				Route::put('/clinics/{clinic}/sections/{section}', 'ClinicSectionsController@update')->name('clinics.sections.update');

				// Clinic Section Schedule Route
				Route::get('/clinics/{clinic}/sections/{section}/schedules/create', 'ClinicSectionSchedulesController@create')->name('clinics.sections.schedules.create');
				Route::post('/clinics/{clinic}/sections/{section}/schedules', 'ClinicSectionSchedulesController@store')->name('clinics.sections.schedules.store');
				Route::get('/clinics/{clinic}/sections/{section}/schedules/{schedule}/edit', 'ClinicSectionSchedulesController@edit')->name('clinics.sections.schedules.edit');
				Route::put('/clinics/{clinic}/sections/{section}/schedules/{schedule}', 'ClinicSectionSchedulesController@update')->name('clinics.sections.schedules.update');

				// Service Rates Route
				Route::get('/rates/create', 'RatesController@create')->name('rates.create');
				Route::post('/rates', 'RatesController@store')->name('rates.store');
				Route::get('/rates/{rate}/edit', 'RatesController@edit')->name('rates.edit');
				Route::put('/rates/{rate}', 'RatesController@update')->name('rates.update');

				// Service Rates Radiology Section Route
				Route::get('/rates/radiology/sections/create', 'RadiologySectionsController@create')->name('rates.radiology.sections.create');
				Route::post('/rates/radiology/sections', 'RadiologySectionsController@store')->name('rates.radiology.sections.store');

				// Service Rates Radiology Section Entry Route
				Route::get('/rates/radiology/sections/{section}/entries/create', 'RadiologySectionEntriesController@create')->name('rates.radiology.sections.entries.create');
				Route::post('/rates/radiology/sections/{section}/entries', 'RadiologySectionEntriesController@store')->name('rates.radiology.sections.entries.store');
	

		});

/*
 * Directory Route
 * ------------------------------------------------------------------------------------------------------------------
 */

		// Profile Route
		Route::get('/profile', 'ProfileController@index')->name('profile');


		// Services Route
		Route::get('/services', 'ServicesController@index');
		Route::get('/services/{service}', 'ServicesController@show');

		// Section Route
		Route::get('/services/{service}/sections', 'SectionsController@index');

		// Clinic Schedule Route
		Route::get('/clinics', 'ClinicsController@index');
		Route::get('/clinics/{clinic}', 'ClinicsController@show');

		// Rates Route
		Route::get('/rates', 'RatesController@index')->name('rates');

		// Radiology Rates Route
		Route::get('/rates/radiology', 'RadiologyController@index')->name('rates.radiology');
		//Route::get('/rates/{rate}', 'RatesController@show');






