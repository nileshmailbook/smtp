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

Route::group(['prefix'=>'smtp', 'middleware'=>['web','auth']], function(){

//smtp configuration

Route::get('/', 'Neil\mailSetting\Controllers\SettingController@index')->name('smtp.index');
Route::post('/store', 'Neil\mailSetting\Controllers\SettingController@store')->name('smtp.store');
Route::post('/update/{id}', 'Neil\mailSetting\Controllers\SettingController@update')->name('smtp.update');

//smtp test check
Route::post('/check', 'Neil\mailSetting\Controllers\SettingController@smtpCheck')->name('smtp.check'); 
});