<?php

use App\Http\Controllers\CartPageController;
use App\Http\Controllers\CatalogPageController;
use App\Http\Controllers\CheckoutPageController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return redirect()->route('catalog.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/checkout/success', function () {
    return view('checkout_success');
})->name('checkout.success');

Route::get('/catalog', [CatalogPageController::class, 'index'])->name('catalog.index');
Route::get('/catalog/{id}', [CatalogPageController::class, 'show'])->name('catalog.show');

Route::get('/product/{id}', [ProductPageController::class, 'show'])->name('product.show');

Route::get('/cart', [CartPageController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartPageController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{id}', [CartPageController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutPageController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutPageController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutPageController::class, 'success']);

/*Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});*/

require __DIR__.'/auth.php';
