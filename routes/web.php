<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopingCartController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Auth;
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
Route::get("/", [HomepageController::class, "index"])->name("homepage");

Route::get("/contact", [ContactController::class, "index"]);

Route::view("/about", "about");

Route::get("/shop", [ShopController::class, "index"]);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::controller(ProductController::class)->name('profile.')->group(function () {

        Route::get('/profile', 'edit')->name('edit');
        Route::patch('/profile', 'update')->name('update');
        Route::delete('/profile', 'destroy')->name('destroy');
    });
});

Route::middleware("auth")->group(function (){

    Route::controller(ShopingCartController::class)->prefix('/cart')->name('cart.')->group(function () {

        Route::post("/add", "addToCart")->name("add");
        Route::get("/",  "index")->name("index");
        Route::get("/finish", "orderFinish")->name("finish");
    });

    Route::get("/products/{product}", [ProductController::class, "permalink"])->name("product.permalink");
});

Route::middleware(["auth", AdminCheckMiddleware::class])->prefix("/admin")->group(function () {

    Route::controller(ContactController::class)->prefix("/contact")->name("contact.")->group(function () {

        Route::post("/send", "sendContact")
            ->name("send");
        Route::post("/update/{contact}", "updateContact")
            ->name("update");
        Route::get("/all", "getAllContacts")
            ->name("all");
        Route::get("/delete/{contact}", "deleteContact")
            ->name("delete");
        Route::get("/{contact}", "getContactById")
            ->name("single");
    });

    Route::controller(ProductController::class)->prefix("/product")->name("product.")->group(function () {

        Route::post("/new", "saveProduct")
            ->name("save");
        Route::post("/update/{product}",  "updateProduct")
            ->name("update");
        Route::get("/all", "getAllProducts")
            ->name("all");
        Route::get("/delete/{product}",  "deleteProduct")
            ->name("delete");
        Route::get("/{product}", "getProductById")
            ->name("single");
    });

    Route::view("/add-product", "addProduct");
});

require __DIR__.'/auth.php';
