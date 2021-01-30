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

//Route::get('/', function () {
//    return view('welcome');
//});
Auth::routes();
/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->group(function (){

    Route::get('/login', 'LoginController@showAdminLoginForm');
    Route::post('/login', 'LoginController@adminLogin');

    Route::middleware('guest:admin')->group(function () {
        Route::get('logout', 'LoginController@logoutAdmin');
        //Route::get('/dashboard', 'LoginController@dashboard');
    });

});*/

// after login
Route::namespace('Admin')->prefix('admin')->middleware('auth:admin')->group(function() {
    Route::get('dashboard', 'HomeController@dashboard')->name('admin.dashboard');
    Route::post('logout','Auth\LoginController@Adminlogout')->name('admin.logout');
});

// before login

Route::namespace('Admin\Auth')->prefix('admin')->middleware('guest:admin')->group(function(){

    //Login Routes
    Route::get('/login','LoginController@showLoginForm')->name('admin.login');
    Route::post('/login','LoginController@login')->name('admin.login.post');

    //Forgot Password Routes
//    Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
//    Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//
//    //Reset Password Routes
//    Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
//    Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

});

// or normal user
Route::get('/home','HomeController@index')->name('home');
Route::get('/','HomeController@home')->name('welcome');




