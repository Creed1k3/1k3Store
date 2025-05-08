<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CategorySeeder extends Seeder
{
    public function run()
    {
        // Заполняем таблицу категорий
        Category::factory()->count(10)->create();  // Создаст 10 случайных категорий
    }
}
