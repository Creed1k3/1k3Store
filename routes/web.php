<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

