<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;


Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/catalog', [ProductController::class, 'index']);

Route::get('/favorites', function () {
    return view('favorites');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/product/{product:slug}', [ProductController::class, 'show'])
     ->name('product.show');
