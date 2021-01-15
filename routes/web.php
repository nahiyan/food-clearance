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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CompanyPanelController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReportController;

// Home
Route::get("/", [HomeController::class, 'index'])->name("index");
Route::get('/home', [HomeController::class, 'index'])->name('home');

// User Authentication
Auth::routes();

// Admin
Route::middleware(['auth.admin'])->group(function () {
    Route::name("admin.")->group(function () {
        Route::resource("admin/users", UserController::class);
        Route::resource("admin/foods", FoodController::class);
        Route::resource("admin/companies", CompanyController::class);
        Route::resource("admin/transactions", TransactionController::class)->only("index", "destroy");
        Route::resource("admin/reports", ReportController::class)->only("index", "destroy");
    });
    Route::resource("admin", AdminPanelController::class)->only("index");
});

// Company
Route::middleware(['auth.company'])->group(function () {
    Route::name("company.")->group(function () {
        Route::resource("company/foods", FoodController::class);
        Route::resource("company/companies", CompanyController::class);
        Route::resource("company/transactions", TransactionController::class)->only("index", "destroy");
    });
    Route::resource("company", CompanyPanelController::class)->only("index");
});

// Search
Route::get("search/{query}", [SearchController::class, 'index']);

// Logged in users
Route::group(['middleware' => ['auth']], function () {
    // Cart
    Route::resource("cart", CartController::class)->only("index", "store", "destroy");
    Route::get("cart/checkout", [CartController::class, 'checkout'])->name("cart.checkout");

    // Food purchase
    Route::post("foods/{id}/buy", [FoodController::class, 'buy'])->name("foods.buy");

    // Report
    Route::resource("reports", ReportController::class)->only("store", "create");
});
