<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Список товаров с реальными названиями и описаниями
        $products = [
            // Смартфоны
            ['category_id' => 1, 'title' => 'Apple iPhone 13 Pro',       'description' => 'Ультра‑четкая тройная камера и A15 Bionic.', 'price' => 99900,  'old_price' => 109900, 'slug' => 'iphone-13-pro',       'sku' => 'APL-IPH13P'],
            ['category_id' => 1, 'title' => 'Samsung Galaxy S21',        'description' => '108 МП камера, запись 8K, Exynos 2100.',      'price' => 79900,  'old_price' => 89900,  'slug' => 'samsung-galaxy-s21',  'sku' => 'SMS-S21'],
            ['category_id' => 1, 'title' => 'Google Pixel 6',            'description' => 'Чип Google Tensor, отличная ночная съёмка.',    'price' => 59900,  'old_price' => null,    'slug' => 'google-pixel-6',      'sku' => 'GGL-PX6'],

            // Ноутбуки
            ['category_id' => 2, 'title' => 'Apple MacBook Pro 14"',    'description' => 'Чип M1 Pro, XDR дисплей.',                      'price' => 199900, 'old_price' => null,    'slug' => 'macbook-pro-14',      'sku' => 'APL-MBP14'],
            ['category_id' => 2, 'title' => 'Dell XPS 13',               'description' => 'Intel i7, 16 ГБ ОЗУ, InfinityEdge дисплей.',    'price' => 129900, 'old_price' => 139900,  'slug' => 'dell-xps-13',         'sku' => 'DLL-XPS13'],
            ['category_id' => 2, 'title' => 'HP Envy 15',                'description' => 'Intel i9, NVIDIA RTX 3050, 4K дисплей.',        'price' => 159900, 'old_price' => null,    'slug' => 'hp-envy-15',          'sku' => 'HP-ENV15'],
            ['category_id' => 2, 'title' => 'Asus ROG Strix G15',         'description' => 'AMD Ryzen 9, RTX 3070, 144 Гц дисплей.',        'price' => 149900, 'old_price' => null,    'slug' => 'asus-rog-strix-g15',  'sku' => 'ASU-ROG15'],

            // Наушники
            ['category_id' => 3, 'title' => 'Sony WH-1000XM4',           'description' => 'Лучшее шумоподавление в отрасли.',              'price' => 34900,  'old_price' => 37900,   'slug' => 'sony-wh-1000xm4',     'sku' => 'SNY-WHXM4'],
            ['category_id' => 3, 'title' => 'Bose QuietComfort 35 II',   'description' => 'Комфорт и сбалансированный звук.',              'price' => 29900,  'old_price' => null,    'slug' => 'bose-qc35-ii',        'sku' => 'BSE-QC35'],
            ['category_id' => 3, 'title' => 'Apple AirPods Pro',          'description' => 'Активное шумоподавление, режим прозрачности.',   'price' => 24900,  'old_price' => 26900,   'slug' => 'airpods-pro',         'sku' => 'APL-APRO'],

            // Телевизоры
            ['category_id' => 4, 'title' => 'Samsung QLED 65"',          'description' => '4K UHD, Quantum HDR, Smart TV.',               'price' => 109900, 'old_price' => 129900,  'slug' => 'samsung-qled-65',     'sku' => 'SMS-Q65'],
            ['category_id' => 4, 'title' => 'LG OLED 55"',               'description' => '4K OLED, Dolby Vision, webOS.',                 'price' => 119900, 'old_price' => null,    'slug' => 'lg-oled-55',          'sku' => 'LG-OLED55'],

            // Фотоаппараты
            ['category_id' => 5, 'title' => 'Canon EOS R6',              'description' => '20 МП полнокадровая матрица, 4K60.',           'price' => 249900, 'old_price' => null,    'slug' => 'canon-eos-r6',        'sku' => 'CAN-R6'],
            ['category_id' => 5, 'title' => 'Nikon D850',                'description' => '45.7 МП, 9 кадр/сек, 153-точечный AF.',         'price' => 299900, 'old_price' => null,    'slug' => 'nikon-d850',          'sku' => 'NIK-D850'],
            ['category_id' => 5, 'title' => 'Sony A7 III',               'description' => '24 МП, 10 кадр/сек, 4K видео.',                'price' => 199900, 'old_price' => 219900,  'slug' => 'sony-a7-iii',         'sku' => 'SNY-A7III'],

            // Носимые устройства
            ['category_id' => 6, 'title' => 'Apple Watch Series 7',      'description' => 'Always-On дисплей, фитнес‑трекер.',           'price' => 39900,  'old_price' => null,    'slug' => 'apple-watch-7',       'sku' => 'APL-AW7'],
            ['category_id' => 6, 'title' => 'Samsung Galaxy Watch 4',    'description' => 'Wear OS, измерение состава тела.',              'price' => 24900,  'old_price' => 27900,   'slug' => 'galaxy-watch-4',      'sku' => 'SMS-W4'],
        ];

        foreach ($products as $item) {
            // Обновляем или создаём товар по уникальному slug
            Product::updateOrCreate(['slug' => $item['slug']], $item);
        }
    }
}
