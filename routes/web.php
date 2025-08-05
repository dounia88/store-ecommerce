<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;

// Route de test simple
Route::get('/test', function () {
    return response()->json([
        'message' => 'Laravel fonctionne correctement !',
        'timestamp' => now(),
        'products_count' => \App\Models\Product::count(),
        'categories_count' => \App\Models\Category::count()
    ]);
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/category/{categorySlug}', [ProductController::class, 'byCategory'])->name('category.show');
Route::get('/search', [ProductController::class, 'search'])->name('search');

Route::get('/cart', function () {
    return Inertia::render('Cart', [
        'title' => 'Panier - E-Commerce',
        'cart' => [
            'items' => [],
            'total' => 0
        ]
    ]);
})->name('cart.index');

Route::get('/checkout', function () {
    return Inertia::render('Checkout', [
        'title' => 'Commande - E-Commerce'
    ]);
})->name('checkout.index');

Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::patch('/orders/{id}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

// Nouvelles routes pour la navbar
Route::get('/about', function () {
    return Inertia::render('About', [
        'title' => 'À propos - E-Commerce'
    ]);
})->name('about');

Route::get('/contact', function () {
    return Inertia::render('Contact', [
        'title' => 'Contact - E-Commerce'
    ]);
})->name('contact');

Route::get('/offers', function () {
    return Inertia::render('Offers', [
        'title' => 'Offres spéciales - E-Commerce',
        'offers' => [
            ['id' => 1, 'title' => 'Soldes d\'été', 'discount' => '50%', 'description' => 'Jusqu\'à 50% de réduction sur tous les vêtements'],
            ['id' => 2, 'title' => 'Black Friday', 'discount' => '70%', 'description' => 'Offres exceptionnelles sur l\'électronique'],
        ]
    ]);
})->name('offers');
