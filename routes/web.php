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
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
/* -- -- -- -- Admin Routes Starts -- -- -- -- */
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'namespace' => 'Admin'], function () {

    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/', 'AdminController@show')->name('admin.dashboard');
    Route::get('/accepted-qauotations','AdminController@acceptedqauotations')->name('admin.accepted');
    Route::get('/showquotation/{id}', 'AdminController@showquotation')->name('ShowQuotation');
    Route::get('/destroy/{id}', 'AdminController@destroy')->name('Destroy');
    Route::get('forward/{id}','AdminController@forward')->name('forward');
});

Route::group(['middleware'=>['auth','superadmin'],'prefix'=>'superadmin',],function(){
    //Route::get('/','super_admin@index')-name('superdashboard');
    Route::get('/','superadmin@index')->name('superadmin.dashboard');
    Route::get('/showquotation/{id}', 'superadmin@show')->name('showquotation');
    Route::get('reject/{id}', 'superadmin@reject')->name('reject');
    Route::get('approve/{id}', 'superadmin@approve')->name('approve');
    Route::get('/destroy/{id}', 'superadmin@destroy')->name('Destroyfromsuper');
    Route::get('calculate/{id}','superadmin@calculate')->name('calculate');
    Route::get('recalculateview/{id}','superadmin@recalculateview')->name('recalculateview');
    Route::post('recalculateview/{id}','superadmin@recalculate')->name('recalculate');
    Route::post('/calculate/update/{id}', 'superadmin@update')->name('superadmin.update');
});
/* -- -- -- -- Admin Routes Ends -- -- -- -- */
/* -- -- -- -- Users Routes Starts -- -- -- -- */
Route::group(['middleware' => 'auth', 'namespace' => 'User'], function () {
    Route::get('/profile', 'ProfileController@myProfile')->name('profile.myProfile');
    Route::get('/api/auth-user', 'ProfileController@getUser');
    Route::post('/profile/image/upload', 'ProfileController@uploadImage')->name('uploadProfileImage');
    // Rating System Starts
    Route::get('/rating', 'ProfileController@whoRate')->name('rating.who');
    // Rating System Ends
    // Consultant Starts
    Route::get('/consultant/request', 'ConsultantsController@index')->name('consultant');
    Route::post('/consultant/store', 'ConsultantsController@store')->name('consultant.store');
    // Consultant Ends
});
/* -- -- -- -- Public Routes Starts -- -- -- -- */
Route::group(['middleware' => ['auth' , 'user'], 'namespace' => 'User'], function () {
    Route::get('/', 'ConsultantsController@index', function(){return  redirect('/consultants');})->name('home');
    Route::get('{username}/profile', 'ProfileController@publicProfile')->where(['username' => '[a-z0-9]+(?:-[a-z0-9]+)*'])->name('profile.public');
    Route::get('/showquotation/{id}', 'ConsultantsController@view')->name('showuserquotation');
    Route::get('/destroy/{id}', 'ConsultantsController@destroy')->name('Destroyfromuser');
    Route::get('edit/{id}','ConsultantsController@edit')->name('edit');
    Route::post('update/{id}','ConsultantsController@update')->name('update');
});

// Success Route
Route::get('/success', function () {
    if (!Session::has('status') || Session::get('status') !== 'success') {
        return redirect('/');
    }
    return view('public.success');
})->name('successRoute');
/* -- -- -- -- Public Routes Ends -- -- -- -- */


