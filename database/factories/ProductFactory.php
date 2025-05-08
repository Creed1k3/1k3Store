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
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 1000, 100000),
            'old_price' => null,
            'image' => $this->faker->imageUrl(640, 640, 'technics', true, 'Product'),
            'slug' => $this->faker->slug,  // Генерация слага из названия
            'sku' => 'SKU-' . strtoupper($this->faker->lexify('????')),  // Генерация уникального SKU
        ];
    }
    
}
