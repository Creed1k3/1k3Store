<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
public function show(Product $product)
{
    $product->load([
        'category.parent',
        'images',
        'colors',
        'reviews',
        'characteristics',
        'discounts',
        'relatedProducts'
    ]);

    // Вычисляем средний рейтинг для этого продукта
    if ($product->reviews->isNotEmpty()) {
        $product->averageRating = $product->reviews->avg('rating');
    } else {
        $product->averageRating = 0;
    }

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

    // Добавляем средний рейтинг для каждого товара
    $products->each(function ($product) {
        // Вычисляем средний рейтинг, если есть отзывы
        if ($product->reviews->isNotEmpty()) {
            $product->averageRating = $product->reviews->avg('rating'); // средний рейтинг
        } else {
            $product->averageRating = 0; // если нет отзывов, ставим рейтинг 0 или null
        }
    });

    $categories = Category::with('children')->get();

    return view('catalog', compact('products', 'categories')); // Передаем список товаров в представление
}

}