<?php
/** @var \Illuminate\Routing\Router $router */
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Admin\AdminController;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::view('/contact', 'contact')->name('contact');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
Route::get('/contact', [ContactController::class, 'index'])->
name('contact.index');
Route::get('/contact/{id}', [ContactController::class, 'show'])->
name('contact.show');

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/shop', [PageController::class, 'shop'])->name('shop');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');


Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::domain('admin.esweet.local')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders');
    Route::get('/products', [AdminController::class, 'products'])->name('admin.products');
    // Add other admin routes here
});

Route::get('verify-email', EmailVerificationPromptController::class)
    ->middleware('auth')
    ->name('verification.notice');

require __DIR__.'/auth.php';