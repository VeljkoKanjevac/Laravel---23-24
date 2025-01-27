<?php

use App\Http\Controllers\ProductController;
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

// DOMACI ZADATAK 8
Route::get("/admin/product/{id}", [\App\Http\Controllers\ProductController::class, "getProductById"])
    ->name("getProduct");

Route::post("/admin/update-product/{id}", [\App\Http\Controllers\ProductController::class, "updateProduct"])
    ->name("updateProduct");

Route::get("/admin/contact/{id}", [\App\Http\Controllers\ContactController::class, "getContactById"])
    ->name("getContact");

Route::post("/admin/update-contact/{id}", [\App\Http\Controllers\ContactController::class, "updateContact"])
    ->name("updateContact");
