<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory()
            ->count(10)
            ->afterCreating(function (Product $product) {
                $colors = ['black', 'white', 'silver', 'blue', 'red'];
                $selectedColors = array_rand(array_flip($colors), 2);

                foreach ((array) $selectedColors as $color) {
                    $product->colors()->create([
                        'color' => $color
                    ]);
                }
            })
            ->create();
    }
}
