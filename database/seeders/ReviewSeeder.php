<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Product;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Запускаем сидер.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create(); // Создаём экземпляр Faker

        // Для каждого продукта создаём случайное количество отзывов от 5 до 11
        Product::all()->each(function ($product) use ($faker) {
            // Генерируем случайное количество отзывов от 5 до 11
            $numReviews = $faker->numberBetween(5, 11);

            for ($i = 0; $i < $numReviews; $i++) {
                Review::create([
                    'product_id' => $product->id,
                    'author' => $faker->name, // случайное имя автора
                    'rating' => $faker->numberBetween(1, 5), // случайная оценка от 1 до 5
                    'text' => $faker->paragraph, // случайный текст отзыва
                ]);
            }
        });
    }
}
