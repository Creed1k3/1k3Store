<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $titles = [
            'Смартфон Samsung Galaxy A54 128GB',
            'Ноутбук ASUS VivoBook 15 X1500EA',
            'Телевизор LG 50UP75006LF 50"',
            'Планшет Apple iPad 10.2" 64GB Wi-Fi',
            'Игровая приставка Sony PlayStation 5',
            'Монитор Acer Nitro 27" 165Гц',
            'Наушники беспроводные JBL Tune 510BT',
            'Умная колонка Яндекс Станция Мини',
            'Смарт-часы Xiaomi Redmi Watch 3',
            'Видеокарта Gigabyte GeForce RTX 4060',
            'Процессор AMD Ryzen 5 5600X',
            'Микроволновая печь Samsung ME83KRW-1',
            'Кофемашина DeLonghi Magnifica S ECAM',
            'Холодильник LG GA-B509CEUM',
            'Пылесос-робот Xiaomi Mi Robot Vacuum-Mop'
        ];

        $descriptions = [
            'Мощный и стильный смартфон с AMOLED-экраном и хорошей камерой.',
            'Универсальный ноутбук для работы и учёбы с быстрым SSD.',
            'Чёткое изображение, поддержка Smart TV и отличная диагональ.',
            'Удобный планшет для серфинга, фильмов и учебы.',
            'Консоль нового поколения с молниеносной загрузкой игр.',
            'Игровой монитор с высокой герцовкой и IPS-матрицей.',
            'Лёгкие и удобные наушники с мощным звуком и Bluetooth 5.0.',
            'Компактная колонка с Алисой, идеально для дома.',
            'Смарт-часы с AMOLED-экраном и точным трекингом активности.',
            'Игровая видеокарта нового поколения с поддержкой DLSS 3.',
            '6-ядерный процессор для сборки среднего игрового ПК.',
            'Компактная микроволновка с авторазморозкой и грилем.',
            'Автоматическая кофемашина с настройкой крепости напитка.',
            'Современный холодильник с системой Total No Frost.',
            'Робот-пылесос с функцией влажной уборки и управлением через приложение.'
        ];

         $images = [
            'https://avatars.mds.yandex.net/i?id=f2c675665cd630560b442d14d12746db14eb8bc2-11907031-images-thumbs&n=13',
            'https://avatars.mds.yandex.net/i?id=ce38697c99835f4a7a0a3d47c216482150751677-4450014-images-thumbs&n=13',
            'https://avatars.mds.yandex.net/get-mpic/12396668/2a0000019091b94d5617d1503454dd11a32c/orig',
            'https://avatars.mds.yandex.net/i?id=28abdecbb6ebaa4fc6d5c4aaa30d7355a7374b53-8334793-images-thumbs&n=13'
        ];

        $index = array_rand($titles);
        $price = fake()->numberBetween(9990, 139990);
        $lastDigit = fake()->randomElement([0, 499, 999]);
        $price = $price - ($price % 1000) + $lastDigit;

        return [
            'category_id' => Category::inRandomOrder()->first()?->id ?? 1,
            'title' => $titles[$index],
            'description' => $descriptions[$index],
            'price' => $price,
            'old_price' => $price + fake()->numberBetween(1000, 5000),
            'image' => fake()->randomElement($images),
            'slug' => str()->slug($titles[$index]) . '-' . fake()->unique()->randomNumber(5),
            'sku' => 'SKU-' . strtoupper(fake()->lexify('????')),
        ];
    }
}
