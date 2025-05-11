<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
{
    $products = Product::with('category')->paginate(12);
    $categories = Category::whereNull('parent_id')->get();
    return view('catalog', compact('products', 'categories'));
}
 public function show($slug)
    {
        // Получаем товар по slug
        $product = Product::where('slug', $slug)
            ->with(['category', 'reviews', 'colors', 'images']) // Загружаем связанные данные
            ->first();

        if (!$product) {
            return response()->json(['error' => 'Товар не найден'], 404);
        }

        // Строим цепочку категорий для хлебных крошек
        $categoryTrail = [];
        $category = $product->category;
        while ($category) {
            $categoryTrail[] = [
                'name' => $category->name,
                'url' => route('catalog.category', ['slug' => $category->slug])
            ];
            $category = $category->parent;
        }

        // Отправляем данные в формате JSON
        return response()->json([
            'product' => [
                'title' => $product->title,
                'long_description' => $product->long_description,
                'price' => $product->price,
                'old_price' => $product->old_price,
                'reviews' => $product->reviews,
                'colors' => $product->colors,
                'images' => $product->images,
                'category' => $product->category,
                'characteristics' => $product->characteristics, // Характеристики товара
            ],
            'categoryTrail' => $categoryTrail
        ]);
    }
}
