<?php

use App\Http\Controllers\ProfileController;
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

Route::get("/", [\App\Http\Controllers\HomepageController::class, "index"]);

Route::get("/shop", [\App\Http\Controllers\ShopController::class, "index"]);

Route::get("/contact", [\App\Http\Controllers\ContactController::class, "index"]);

Route::view("/about", "about");

Route::post("/send-contact", [\App\Http\Controllers\ContactController::class, "sendContact"]);



Route::view("/admin/add-product", "addProduct");

Route::post("/admin/new-product", [\App\Http\Controllers\ProductController::class, "saveProduct"]);

Route::get("/admin/all-contacts", [\App\Http\Controllers\ContactController::class, "getAllContacts"])
    ->name("allContacts");

Route::get("/admin/all-products", [\App\Http\Controllers\ProductController::class, "getAllProducts"])
    ->name("allProducts");

Route::get("/admin/delete-product/{product}", [\App\Http\Controllers\ProductController::class, "deleteProduct"])
    ->name("deleteProduct");

Route::get("/admin/delete-contact/{contact}", [\App\Http\Controllers\ContactController::class, "deleteContact"])
    ->name("deleteContact");

Route::get("/admin/product/{id}", [\App\Http\Controllers\ProductController::class, "getProductById"])
    ->name("getProduct");

Route::post("/admin/update-product/{id}", [\App\Http\Controllers\ProductController::class, "updateProduct"])
    ->name("updateProduct");

Route::get("/admin/contact/{id}", [\App\Http\Controllers\ContactController::class, "getContactById"])
    ->name("getContact");

Route::post("/admin/update-contact/{id}", [\App\Http\Controllers\ContactController::class, "updateContact"])
    ->name("updateContact");



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
