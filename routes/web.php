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
Route::group(['middleware' => ['auth.admin']], function () {
    Route::resource("admin/users", "UserController");
    Route::resource("admin/foods", "FoodController");
    Route::resource("admin/companies", "CompanyController");
    Route::resource("admin/transactions", "TransactionController")->only("index", "destroy");
    Route::resource("admin", "AdminPanelController");
});

// Company
Route::group(['middleware' => ['auth.company']], function () {
    Route::resource("company/foods", "FoodController");
    Route::resource("company/companies", "CompanyController");
    Route::resource("company/transactions", "TransactionController")->only("index", "destroy");
    Route::resource("company", "CompanyPanelController");
});

// Search
Route::get("search/{query}", "SearchController@index");

Route::group(['middleware' => ['auth']], function () {
    Route::resource("cart", "CartController");

    // Food purchase
    Route::post("foods/{id}/buy", "FoodController@buy")->name("foods.buy");
});
