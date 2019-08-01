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
Route::resource('employee','employee');
Route::resource('employee_info','employee_info');
Route::resource('employee_degree','employee_degree');
Route::resource('employee_course','employee_course');
Route::resource('employee_experience','employee_experience');