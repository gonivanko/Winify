<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/welcome', function () {
    return view('welcome');
});

// All Products
Route::get('/', [
    ProductController::class, 'index'
]);

// Show Create Form
Route::get('/products/create', [
    ProductController::class, 'create'
]);

// Store Product Data
Route::post('/products', [
    ProductController::class, 'store'
]);

// Edit Single Product
Route::get('/products/{product}/edit', [
    ProductController::class, 'edit'
]);

// Show Single Product
Route::get('/products/{product}', [
    ProductController::class, 'show'
]);

// Update Single Product
Route::put('/products/{product}', [
    ProductController::class, 'update'
]);

// Delete Single Product
Route::delete('/products/{product}', [
    ProductController::class, 'delete'
]);

// Show Register Form
Route::get('/register', [
    UserController::class, 'register'
]);

// Store New User Data
Route::get('/users', [
    UserController::class, 'store'
]);

Route::get('/login', [
    UserController::class, 'login'
]);



Route::get('/about', function () {
    return view('about');
});

