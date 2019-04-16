<?php

use App\Model\Languages;
use App\Model\Labels_Keys;
use App\Model\Labels_Values;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
/* -- -- -- -- Admin Routes Starts -- -- -- -- */
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/', 'AdminController@index')->name('admin.dashboard');


    /* -- -- -- Languages STARTS -- -- -- */
    Route::get('languages', 'LanguagesController@index')->name('languages_index');
    Route::get('language/create', 'LanguagesController@create')->name('language_new');
    Route::post('language/create', 'LanguagesController@store')->name('languages_store');
    Route::get('language/{id}', 'LanguagesController@edit')->name('language_edit')->where('id', '[0-9]+');
    Route::patch('language/create', 'LanguagesController@update')->name('languages_update');
    Route::post('language/activate', 'LanguagesController@Active')->name('activate_language');
    Route::post('language/deactivate', 'LanguagesController@InActive')->name('deactivate_language');
    Route::get('languages/labels', 'LanguagesController@labels')->name('languages_labels');
    // Route::get('languages/values/create', 'LanguagesController@createValues')->name('values.create');
    // Route::post('languages/values/create', 'LanguagesController@storeValues')->name('values.store');
    Route::get('languages/key/create', 'LanguagesController@createKey')->name('key.create');
    Route::post('languages/key/store', 'LanguagesController@storeKey')->name('key.store');
    Route::get('languages/values/edit/{id}', 'LanguagesController@editValue')->name('values.edit');
    Route::patch('/language/values/update/{id}', 'LanguagesController@updateValue')->name('values.update');
    Route::get('/language/{language_id}/labels', 'LanguagesController@LanguageLabels')->where('language_id', '[0-9]+')->name('languages.labels');
    Route::post('/language/{language_id}/store/labels', 'LanguagesController@storeLanguageLabel')->name('languages.labels.save');
    // AJAX ROUTES
    Route::post('/languages/categories', 'LanguagesController@getCategories')->name('getCategories');
    /* -- -- -- Languages ENDS -- -- -- */

    /* -- -- -- Website Settings STARTS -- -- -- */
    Route::get('/settings', 'SettingsController@index')->name('settings_index');
    Route::post('/settings/update', 'SettingsController@setting_save')->name('settings_update');
    /* -- -- -- Website Settings Ends -- -- -- */


    /* -- -- -- Consultant Module Starts -- -- -- */
    Route::get('/consultants', 'ConsultantsController@index')->name('admin.consultant.index');
    Route::get('/consultant/{id}', 'ConsultantsController@show')->name('admin.consultant.show')->where('id', '[0-9]+');
    Route::post('/consultant/assign', 'ConsultantsController@assign')->name('admin.consultant.sendDoctor');
    /* -- -- -- Consultant Module Ends -- -- -- */



});
/* -- -- -- -- Admin Routes Ends -- -- -- -- */

/* -- -- -- -- Users Routes Starts -- -- -- -- */
Route::group(['middleware' => 'auth', 'namespace' => 'User'], function () {
    Route::get('/profile', 'ProfileController@myProfile')->name('profile.myProfile');
    Route::get('/api/auth-user', 'ProfileController@getUser');
    Route::post('/profile/image/upload', 'ProfileController@uploadImage')->name('uploadProfileImage');
    // AJAX METHOD STARTS
    Route::put('/profile/update/address', 'ProfileController@updateAddress')->name('updateAddress');
    Route::put('/profile/update/phone', 'ProfileController@updatePhone')->name('updatePhone');
    Route::post('/profile/update/password', 'ProfileController@updatePassword')->name('updatePassword');
    Route::put('/profile/update/about', 'ProfileController@updateInfo')->name('updateInfo');
    // AJAX METHOD ENDS
    // Rating System Starts
    Route::get('/rating', 'ProfileController@whoRate')->name('rating.who');
    // Rating System Ends
    // Consultant Starts
    Route::get('/consultant/request', 'ConsultantsController@index')->name('consultant');
    Route::post('/consultant/request', 'ConsultantsController@store')->name('consultant.store');
    Route::get('/consultant/{id}', 'ConsultantsController@show');
    Route::post('/consultant/replay/{id}', 'ConsultantsController@Replay')->name('replay.consultant');
    // Consultant Ends
});
/* -- -- -- -- Public Routes Starts -- -- -- -- */
Route::group(['namespace' => 'Web'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::get('{username}/profile', 'ProfileController@publicProfile')
        ->where(['username' => '[a-z0-9]+(?:-[a-z0-9]+)*'])
        ->name('profile.public');
    Route::get('/doctors', 'UsefulLinksController@doctors')->name('doctors');
});
// Success Route
Route::get('/success', function () {
    if (!Session::has('status') || Session::get('status') !== 'success') {
        return redirect('/');
    }
    return view('public.success');
})->name('successRoute');

/* -- -- -- -- Public Routes Ends -- -- -- -- */


