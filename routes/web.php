<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get("/", [HomepageController::class, "index"]);

Route::get("/shop", [ShopController::class, "index"]);

Route::get("/contact", [ContactController::class, "index"]);

Route::view("/about", "about");


Route::middleware("auth")->prefix("/admin")->group(function () {

    Route::post("/send-contact", [ContactController::class, "sendContact"]);

    Route::view("/add-product", "addProduct");

    Route::post("/new-product", [ProductController::class, "saveProduct"]);

    Route::get("/all-contacts", [ContactController::class, "getAllContacts"])
        ->name("allContacts");

    Route::get("/all-products", [ProductController::class, "getAllProducts"])
        ->name("allProducts");

    Route::get("/delete-product/{product}", [ProductController::class, "deleteProduct"])
        ->name("deleteProduct");

    Route::get("/delete-contact/{contact}", [ContactController::class, "deleteContact"])
        ->name("deleteContact");

    Route::get("/product/{product}", [ProductController::class, "getProductById"])
        ->name("getProduct");

    Route::post("/update-product/{product}", [ProductController::class, "updateProduct"])
        ->name("updateProduct");

    Route::get("/contact/{contact}", [ContactController::class, "getContactById"])
        ->name("getContact");

    Route::post("/update-contact/{contact}", [ContactController::class, "updateContact"])
        ->name("updateContact");

});

require __DIR__.'/auth.php';
