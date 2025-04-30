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

    public function getProducts()
    {
        // Новый метод для отдачи продуктов через API
        $products = Product::all();
        return response()->json($products);
    }
}