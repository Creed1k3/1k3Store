<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Это ваш текущий метод для рендеринга Blade-шаблона
        $products = Product::all();
        return view('catalog', compact('products'));
    }

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
}