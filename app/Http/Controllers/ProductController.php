<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
public function show(Product $product)
{
    $product->load([
        'category.parent',        // для хлебных крошек
        'images',                 // URL’ы картинок
        'colors',                 // цвета и image_url
        'reviews',                // отзывы
        'characteristics',        // технические характеристики
        'discounts',              // если нужны расчёты скидок
        'relatedProducts'         // для списка похожих товаров
    ]);

    return view('product', compact('product'));
}

public function index()
{
    // Загружаем все товары с нужными связями
    $products = Product::with([
        'category.parent',        // для хлебных крошек
        'images',                 // URL’ы картинок
        'colors',                 // цвета и image_url
        'reviews',                // отзывы
        'characteristics',        // технические характеристики
        'discounts',              // если нужны расчёты скидок
        'relatedProducts'         // для списка похожих товаров
    ])->get();

    return view('catalog', compact('products')); // Передаем список товаров в представление
}
}