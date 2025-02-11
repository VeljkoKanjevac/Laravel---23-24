<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
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


Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("/admin")->group(function () {

    Route::controller(ContactController::class)->prefix("/contact")->group(function () {

        Route::post("/send", "sendContact")
            ->name("sendContact");
        Route::post("/update/{contact}", "updateContact")
            ->name("updateContact");
        Route::get("/all", "getAllContacts")
            ->name("allContacts");
        Route::get("/delete/{contact}", "deleteContact")
            ->name("deleteContact");
        Route::get("/{contact}", [ContactController::class, "getContactById"])
            ->name("getContact");
    });


    Route::controller(ProductController::class)->prefix("/product")->group(function () {

        Route::post("/new", [ProductController::class, "saveProduct"])
            ->name("saveProduct");
        Route::post("/update/{product}", [ProductController::class, "updateProduct"])
            ->name("updateProduct");
        Route::get("/all", [ProductController::class, "getAllProducts"])
            ->name("allProducts");
        Route::get("/delete/{product}", [ProductController::class, "deleteProduct"])
            ->name("deleteProduct");
        Route::get("/{product}", [ProductController::class, "getProductById"])
            ->name("getProduct");

    });

    Route::view("/add-product", "addProduct");
});

require __DIR__.'/auth.php';
