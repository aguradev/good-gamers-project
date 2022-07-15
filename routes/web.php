<?php

use App\Http\Controllers\admin\AccountContoller;
use App\Http\Controllers\admin\CategoryDataController;
use App\Http\Controllers\admin\CategoryGamesDataController;
use App\Http\Controllers\admin\GalleryGamesController;
use App\Http\Controllers\admin\PaymentGatewayController;
use App\Http\Controllers\admin\GameListDataController;
use App\Http\Controllers\HomeGoodGamersController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

// guest = middleware utk tamu
// auth = middleware yang sudah melakukan login

Route::get("/login", [LoginController::class, "index"])->name('login')->middleware("guest");
Route::post("/login", [LoginController::class, "authenticate"]);
Route::post("/logout", [LoginController::class, "logout"]);
Route::get("/register", [RegisterController::class, "index"])->middleware("guest");
Route::post("/register", [RegisterController::class, "store"]);
Route::get("/profile/{User:username}", [ProfileController::class, "index"])->name("profile")->middleware("auth");
Route::patch("/profile/{User:username}", [ProfileController::class, "update"])->name("profile-update")->middleware("auth");

Route::resource('/', HomeGoodGamersController::class)->middleware("auth");
Route::get('/product/{gamelist}', [HomeGoodGamersController::class, "show"])->name("product")->middleware("auth");


Route::group(["prefix" => "admin", "middleware" => ["auth", "roles:admin"]], function () {
    // Category_data
    Route::get("/create-category", [CategoryDataController::class, "index"])->name('form-category');
    Route::post("/post-create-category", [CategoryDataController::class, "create"])->name('create_category');
    Route::delete("/delete-category/{CategoryDataModel:name_category}", [CategoryDataController::class, "delete"])->name("delete_category");
    Route::get("/get-data-category/{CategoryDataModel:name_category}", [CategoryDataController::class, "edit"]);
    Route::put("{CategoryDataModel:name_category}/update-category", [CategoryDataController::class, "update"])->name("update_category");

    // using resources route because i out of time to make this project lol.
    Route::resource("/payment-gateway", PaymentGatewayController::class);
    Route::resource("/gamelist-data", GameListDataController::class);
    Route::resource("/category-games", CategoryGamesDataController::class);
    Route::resource("/galleries", GalleryGamesController::class);
    Route::resource("/users-account", AccountContoller::class);
});
