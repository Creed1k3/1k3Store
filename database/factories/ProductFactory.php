<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $brands = [
            'Samsung', 'Apple', 'Sony', 'Xiaomi', 'LG', 'Philips', 'Garmin', 'Dell', 'Razer', 'Bose', 'JBL', 'Logitech', 'PlayStation', 'Microsoft', 'Acer', 'HP', 'Alienware', 'Kingston', 'Epson', 'Intel'
        ];

        return [
            'title' => $this->faker->randomElement([
                'Смартфон Samsung Galaxy S21',
                'Ноутбук Apple MacBook Air M1',
                'Телевизор LG OLED55CX',
                'Наушники Sony WH-1000XM4',
                'Планшет Apple iPad Pro 12.9"',
                'Смартфон Xiaomi Redmi Note 10 Pro',
                'Робот-пылесос Xiaomi Mi Robot Vacuum',
                'Видеокарта NVIDIA GeForce RTX 3080',
                'Электрическая зубная щетка Philips Sonicare',
                'Умные часы Garmin Venu 2',
                'Смарт ТВ Samsung QLED',
                'Пылесос Dyson V11',
                'Микроволновая печь Samsung ME81M',
                'Кофемашина DeLonghi Magnifica S',
                'Гарнитура Logitech G Pro X',
                'Монитор Dell UltraSharp U2720Q',
                'Игровая приставка Sony PlayStation 5',
                'Клавиатура Corsair K95 RGB Platinum',
                'Мышь Logitech MX Master 3',
                'Фитнес-браслет Xiaomi Mi Band 6',
                'Смартфон OnePlus 9 Pro',
                'Портативная акустика JBL Charge 4',
                'Проектор Epson EH-TW7100',
                'Веб-камера Logitech C920',
                'Гарнитура Razer Kraken X',
                'Беспроводные наушники Apple AirPods Pro',
                'Умная колонка Amazon Echo Show 10',
                'Процессор Intel Core i7-10700K',
                'SSD Kingston A2000 1TB',
                'Материнская плата ASUS ROG Strix Z590-E',
                'Системный блок Alienware Aurora R11',
                'Флешка SanDisk Ultra 64GB',
                'Карта памяти Samsung EVO Plus 128GB',
                'Телевизор Sony Bravia 55X9000H',
                'Микрофон Blue Yeti X',
                'Игровая мышь Razer DeathAdder Elite',
                'Смарт-лампочка Philips Hue',
                'Стереоколонка Bose SoundLink Revolve',
                'Ультрабук HP Spectre x360',
                'Очки виртуальной реальности Oculus Quest 2',
                'Проектор BenQ TK800M',
                'Умный дом Google Nest Hub Max',
                'Беспроводной маршрутизатор TP-Link Archer C7',
                'Смартфон Realme 8 Pro',
                'Миксер KitchenAid Artisan',
                'Кухонный комбайн Philips HR7778',
                'Гарнитура SteelSeries Arctis 7',
                'Аккумулятор для ноутбука Dell XPS 13',
            ]),
            'price' => $this->faker->numberBetween(5000, 150000), // Цена в рублях
            'image' => 'https://picsum.photos/500/500?random=' . $this->faker->numberBetween(1, 1000), // Картинка с Lorem Picsum
            'category' => $this->faker->randomElement(['electronics', 'home', 'clothing', 'books']), // Категория
            'colors' => json_encode($this->faker->randomElements(['black', 'white', 'silver', 'blue', 'red'], 2)), // Случайные цвета
            'description' => $this->faker->paragraph(3), // Описание
            'manufacturer' => $this->faker->randomElement($brands), // Случайный производитель
        ];
    }
}
