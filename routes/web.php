<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;


Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/favorites', function () {
    return view('favorites');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::prefix('api')->middleware('api')->group(function () {
Route::get('/product/{product:slug}', [CatalogController::class, 'show'])->name('product.show');  // для отображения продукта
});