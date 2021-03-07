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

Route::get('/welcome', 'UserController@home')->name('home');

Route::get('/transfers', 'TransferController@transfers')->name('transfers');

Route::get('/history', 'TransferController@getUserHistory')->name('history');

Route::post('/createTransfer', 'TransferController@createTransfer')->name('createTransfer');

Route::get('/contact', 'ContactController@contact')->name('contact');

Route::get('/register', 'RegistrationController@create') ->name('register');
Route::post('register', 'RegistrationController@store')->name('storeRegister');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store')->name('storeLogin');
Route::get('/logout', 'SessionsController@destroy')->name('logout');
