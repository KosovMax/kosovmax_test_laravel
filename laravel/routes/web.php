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
    // return view('welcome');
    return redirect()->route('main');
});

Auth::routes();

Route::get('/home', 'AdminController@index')->name('home');
Route::get('/main', 'AdminController@main')->name('main');
Route::get('/mail/{email}', 'AdminController@mail')->name('mail');

Route::resource('companies','CompaniesController');
Route::resource('employees','EmployeesController');


