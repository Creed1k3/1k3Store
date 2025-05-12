<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductImagesTableSeeder::class);
        $this->call(ReviewSeeder::class);


    }
}