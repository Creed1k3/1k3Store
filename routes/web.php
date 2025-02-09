<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/favorites', function () {
    return view('favorites');
});

Route::get('/cart', function () {
    return view('cart');
});