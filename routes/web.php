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


Route::get('/', 'HomeController@index')->name('home');

Route::post('/login', 'AuthController@login')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::group(['as' => 'announcement.'], function() {
    Route::group(['middleware' =>['auth']], function() {
        Route::get('/edit', 'AnnouncementController@create')->name('create');
        Route::post('/store', 'AnnouncementController@store')->name('store');
        Route::get('/edit/{id}', 'AnnouncementController@edit')->name('edit');
        Route::post('/update/{id}', 'AnnouncementController@update')->name('update');
        Route::post('/delete/{id}', 'AnnouncementController@delete')->name('delete');
    });

    Route::get('/{id}', 'AnnouncementController@show')->name('show');
});