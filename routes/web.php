<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\AdminController;


// Authenticated user dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// User profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Static pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Product and Shop pages
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::post('/update-cart', [ProductController::class, 'updateCart'])->name('update.cart');
Route::post('/remove-from-cart', [ProductController::class, 'removeFromCart'])->name('remove.from.cart');

// Admin subdomain group
Route::domain('admin.esweet.local')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    // Add more admin routes as needed
});

// Email verification
Route::get('verify-email', EmailVerificationPromptController::class)
    ->middleware('auth')
    ->name('verification.notice');

// Auth routes
require __DIR__ . '/auth.php';
