<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Получаем все товары
        $products = Product::all();

        // Список изображений
        $images = [
            'https://g8.ru/wp-content/uploads/2025/01/iphone-14-plus-the-verge-2-1536x1023-1.jpeg',
            'https://avatars.mds.yandex.net/i?id=ef3d77bc4dbdc8b1f0dfe186d02e7608f6ce76c8-9103996-images-thumbs&n=13',
            'https://avatars.mds.yandex.net/i?id=7b8b241ec7698d37ec2e2d2d7c42d553b07770f6-13203112-images-thumbs&n=13',
            'https://avatars.mds.yandex.net/i?id=b114dcbce4dd683618dcbe9c328a460d1da6d264-10415072-images-thumbs&n=13'
        ];

        foreach ($products as $product) {
            // Случайно выбираем, сколько изображений добавить (от 1 до 3)
            $numImages = rand(1, 3); // Теперь будет от 1 до 3 изображений

            // Выбираем случайные изображения для продукта
            $usedImages = [];

            for ($i = 0; $i < $numImages; $i++) {
                // Случайно выбираем изображение, но проверяем, чтобы оно не повторялось
                do {
                    $imageUrl = $images[array_rand($images)];
                } while (in_array($imageUrl, $usedImages));

                $usedImages[] = $imageUrl;

                DB::table('product_images')->insert([
                    'product_id' => $product->id,
                    'url' => $imageUrl,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
