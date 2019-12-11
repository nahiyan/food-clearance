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

// Home
Route::get("/", "HomeController@index")->name("index");
Route::get('/home', 'HomeController@index')->name('home');

// User Authentication
Auth::routes();

// Admin
Route::resource("admin", "AdminController");

// Company
Route::resource("company", "CompanyController");