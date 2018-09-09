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


Auth::routes();

Route::middleware(['auth'])->group(function () {
   Route::get('/', 'HomeController@index')->name('home');
Route::resource('laundrytype', 'LaundryTypeController');
Route::resource('laundry', 'LaundryController');
Route::resource('role', 'RoleController');
Route::resource('user', 'UserController');
Route::post('/user/activation', 'UserController@activeAdmin')->name('activation');
Route::post('/orderconfirm', 'LaundryController@orderConfirm')->name('orderconfirm');
Route::get('/orderconfirmlist', 'LaundryController@orderConfirmList')->name('orderconfirmlist');
});


