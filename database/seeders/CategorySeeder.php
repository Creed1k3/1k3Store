<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Электроника' => ['Смартфоны', 'Планшеты', 'Ноутбуки'],
            'Бытовая техника' => ['Холодильники', 'Стиральные машины', 'Микроволновки'],
            'Одежда' => ['Мужская', 'Женская', 'Детская'],
            'Спорт и отдых' => ['Велосипеды', 'Тренажёры', 'Палатки'],
            'Книги' => ['Художественная литература', 'Научная литература', 'Детская  литература'],
        ];

        foreach ($categories as $parentName => $children) {
            $parent = Category::create([
                'name' => $parentName,
                'slug' => Str::slug($parentName),
                'parent_id' => null
            ]);

            foreach ($children as $childName) {
                Category::create([
                    'name' => $childName,
                    'slug' => Str::slug($childName),
                    'parent_id' => $parent->id
                ]);
            }
        }
    }
}
