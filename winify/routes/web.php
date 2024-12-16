<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('guest');

// All Products
Route::get('/', [ProductController::class, 'index']);

// Show Create Form
Route::get('/products/create', [ProductController::class, 'create'])->middleware('auth_user');

// Store Product Data
Route::post('/products', [ProductController::class, 'store'])->middleware('auth_user');

// Manage Products
Route::get('/products/manage', [ProductController::class, 'manage'])->middleware('auth_user');

// Edit Single Product
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->middleware('auth_user');

// Show Single Product
Route::get('/products/{product}', [ProductController::class, 'show']);

// Update Single Product
Route::put('/products/{product}', [ProductController::class, 'update'])->middleware('auth_user');

// Delete Single Product
Route::delete('/products/{product}', [ProductController::class, 'delete'])->middleware('auth_user');



// Show Register Form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

// Store New User Data
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Log User Out
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth_user');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login');

// Log User In
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



Route::get('/about', function () {
    return view('about');
});

