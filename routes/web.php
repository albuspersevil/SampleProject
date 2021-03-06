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
    return view('welcome');
});
//--------------------------------Authentication-------------------------------------------//
Route::get('login', 'LoginController@Login')->name('login');
Route::post('loginuser','LoginController@Loginuser');
Route::get('logout', 'LoginController@logout');

//--------------------------------Employee And Company-------------------------------------//
Route::resource('company', 'CompanyController');
Route::resource('employee', 'EmployeeController');
