<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Основные категории электроники
        $categories = [
            ['id' => 1, 'name' => 'Смартфоны',          'slug' => 'smartfony'],
            ['id' => 2, 'name' => 'Ноутбуки',           'slug' => 'noutbuki'],
            ['id' => 3, 'name' => 'Наушники',           'slug' => 'naushniki'],
            ['id' => 4, 'name' => 'Телевизоры',         'slug' => 'televizory'],
            ['id' => 5, 'name' => 'Фотоаппараты',       'slug' => 'fotoapparaty'],
            ['id' => 6, 'name' => 'Носимые устройства', 'slug' => 'nosimye-ustrojstva'],
        ];

        foreach ($categories as $cat) {
            // updateOrCreate гарантирует отсутствие дубликатов
            Category::updateOrCreate(['id' => $cat['id']], $cat);
        }
    }
}