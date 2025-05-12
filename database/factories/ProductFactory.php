<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;



class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $images = [
            'https://avatars.mds.yandex.net/i?id=f2c675665cd630560b442d14d12746db14eb8bc2-11907031-images-thumbs&n=13',
            'https://avatars.mds.yandex.net/i?id=ce38697c99835f4a7a0a3d47c216482150751677-4450014-images-thumbs&n=13',
            'https://avatars.mds.yandex.net/get-mpic/12396668/2a0000019091b94d5617d1503454dd11a32c/orig',
            'https://avatars.mds.yandex.net/i?id=28abdecbb6ebaa4fc6d5c4aaa30d7355a7374b53-8334793-images-thumbs&n=13'
        ];

        // Генерация случайной цены в диапазоне от 8 999 до 159 999
        $basePrice = $this->faker->numberBetween(8999, 159999);

        // Округление цены на 499, 999 или 0
        $lastDigit = $this->faker->randomElement([0, 499, 999]);
        $price = $basePrice - ($basePrice % 1000) + $lastDigit;

        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(),
            'price' => $price,
            'old_price' => null,
            'image' => $this->faker->randomElement($images), // Случайный выбор изображения
            'slug' => $this->faker->slug,  // Генерация слага из названия
            'sku' => 'SKU-' . strtoupper($this->faker->lexify('????')),  // Генерация уникального SKU
        ];
    }

}
