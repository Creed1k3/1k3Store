<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CatalogController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Здесь ты можешь регистрировать маршруты API для своего приложения. Эти
| маршруты автоматически получают префикс "/api".
|
*/

Route::middleware('api')->group(function () {
    // Получить текущую корзину
    Route::get('/cart', [CartController::class, 'getCart']);

    // Добавить товар в корзину
    Route::post('/cart/add', [CartController::class, 'addToCart']);

    // Обновить количество или данные о товаре
    Route::post('/cart/update', [CartController::class, 'updateCart']);
    Route::get('/products', [ProductController::class, 'getProducts']);

    // Удалить товар из корзины
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart']);
});
Route::get('/catalog', [CatalogController::class, 'apiIndex']);