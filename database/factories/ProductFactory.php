<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => '/images/default.png', // Замена на дефолтное изображение или пустую строку
            'title' => $this->faker->sentence(10),
            'price' => $this->faker->randomFloat(2, 1000, 10000),
            'manufacturer' => $this->faker->company,
        ];
    }
}