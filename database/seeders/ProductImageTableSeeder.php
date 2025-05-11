<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageTableSeeder extends Seeder
{
    public function run()
    {
        // URL-ы изображений из официальных источников DNS или производителей
        $images = [
            'iphone-13-pro' => [
                'https://c.dns-shop.ru/thumb/st4/fit/320/250/4a2563a943e0ace45fef2f91fb4a5f96/0d165c6aaa50c9760d5c18407343787349c0f8f1a0da8b4486ab43dc90c8cec3.jpg',
                'https://c.dns-shop.ru/thumb/st4/fit/320/250/6cf0d250075d3c2622e18a34ec38804f/0e7d6bf6f37775dc8016526202eed6871dc689dba8043e5ab8b660caf369cad9.jpg',
            ],
            'samsung-galaxy-s21' => [
                'https://c.dns-shop.ru/thumb/st4/fit/320/250/57ad590e4c4d448284f94972574b7e2e/9567d18107af5c3d1264b429db988c4bc63a8089d4cb76add0236817adeb3af8.jpg',
                'https://c.dns-shop.ru/thumb/st4/fit/320/250/57ad590e4c4d448284f94972574b7e2e/9567d18107af5c3d1264b429db988c4bc63a8089d4cb76add0236817adeb3af8.jpg',
            ],
            'google-pixel-6' => [
                'https://fdn2.gsmarena.com/vv/pics/google/google-pixel-6-1.jpg',
                'https://fdn2.gsmarena.com/vv/pics/google/google-pixel-6-1.jpg',
            ],
            'macbook-pro-14' => [
               'https://c.dns-shop.ru/thumb/st4/fit/320/250/57ad590e4c4d448284f94972574b7e2e/9567d18107af5c3d1264b429db988c4bc63a8089d4cb76add0236817adeb3af8.jpg',
                'https://c.dns-shop.ru/thumb/st4/fit/320/250/57ad590e4c4d448284f94972574b7e2e/9567d18107af5c3d1264b429db988c4bc63a8089d4cb76add0236817adeb3af8.jpg',
            ],
            'dell-xps-13' => [
 'https://c.dns-shop.ru/thumb/st4/fit/320/250/57ad590e4c4d448284f94972574b7e2e/9567d18107af5c3d1264b429db988c4bc63a8089d4cb76add0236817adeb3af8.jpg',
                'https://c.dns-shop.ru/thumb/st4/fit/320/250/57ad590e4c4d448284f94972574b7e2e/9567d18107af5c3d1264b429db988c4bc63a8089d4cb76add0236817adeb3af8.jpg',
            ],
            'hp-envy-15' => [
               'https://c.dns-shop.ru/thumb/st4/fit/320/250/57ad590e4c4d448284f94972574b7e2e/9567d18107af5c3d1264b429db988c4bc63a8089d4cb76add0236817adeb3af8.jpg',
                'https://c.dns-shop.ru/thumb/st4/fit/320/250/57ad590e4c4d448284f94972574b7e2e/9567d18107af5c3d1264b429db988c4bc63a8089d4cb76add0236817adeb3af8.jpg',
            ],
            'asus-rog-strix-g15' => [
 'https://c.dns-shop.ru/thumb/st4/fit/320/250/57ad590e4c4d448284f94972574b7e2e/9567d18107af5c3d1264b429db988c4bc63a8089d4cb76add0236817adeb3af8.jpg',
                'https://c.dns-shop.ru/thumb/st4/fit/320/250/57ad590e4c4d448284f94972574b7e2e/9567d18107af5c3d1264b429db988c4bc63a8089d4cb76add0236817adeb3af8.jpg',
            ],
            'sony-wh-1000xm4' => [
 'https://c.dns-shop.ru/thumb/st4/fit/320/250/57ad590e4c4d448284f94972574b7e2e/9567d18107af5c3d1264b429db988c4bc63a8089d4cb76add0236817adeb3af8.jpg',
                'https://c.dns-shop.ru/thumb/st4/fit/320/250/57ad590e4c4d448284f94972574b7e2e/9567d18107af5c3d1264b429db988c4bc63a8089d4cb76add0236817adeb3af8.jpg',
            ],
            'bose-qc35-ii' => [
                'https://assets.bose.com/content/dam/Bose_DAM/Web/consumer_electronics/global/products/headphones/qc35_ii/product_silo_images/qc35_ii_black_EC_hero.psd',
                'https://assets.bose.com/content/dam/Bose_DAM/Web/consumer_electronics/global/products/headphones/qc35_ii/product_silo_images/qc35_ii_silver_EC_hero.psd',
            ],
            'airpods-pro' => [
                'https://www.apple.com/v/airpods-pro/a/images/overview/hero__e9eiwywd9p6q_large.jpg',
                'https://www.apple.com/v/airpods-pro/a/images/overview/earbuds_1__f4muek93vceu_large.jpg',
            ],
            'samsung-qled-65' => [
                'https://cdn.samsung.com/global/galaxy/2202/gallery/kv/kv-03b.jpg',
                'https://cdn.samsung.com/global/galaxy/2202/gallery/kv/kv-03c.jpg',
            ],
            'lg-oled-55' => [
                'https://www.lg.com/us/images/tvs/md07554501/gallery/55-inch-oled8k-01.jpg',
                'https://www.lg.com/us/images/tvs/md07554501/gallery/55-inch-oled8k-02.jpg',
            ],
            'canon-eos-r6' => [
                'https://cdn.mos.cms.futurecdn.net/ZTPEJBfSjPsEGanT7kdaxo.jpg',
                'https://cdn.mos.cms.futurecdn.net/zu6LY9uB2QZgx6kCwSwVhL.jpg',
            ],
            'nikon-d850' => [
                'https://cdn.mos.cms.futurecdn.net/ZvgFsF5sAKbGgDGuBZTXuB.jpg',
                'https://cdn.mos.cms.futurecdn.net/ZMeaJxoHKJF5rKvnXjJA3J.jpg',
            ],
            'sony-a7-iii' => [
                'https://cdn.mos.cms.futurecdn.net/jjYhgg1TNF4n852gdemyQa.jpg',
                'https://cdn.mos.cms.futurecdn.net/64JuGK2D78VPtMiKZDo8V2.jpg',
            ],
            'apple-watch-7' => [
                'https://www.apple.com/v/watch/home/bo/images/compare/stainless-steel-midnight.png',
                'https://www.apple.com/v/watch/home/bo/images/compare/aluminum-blue.png',
            ],
            'galaxy-watch-4' => [
                'https://images.samsung.com/is/image/samsung/p6pim/levant/galaxy-watch4/gallery/levant-galaxy-watch4-40mm-sm-r860-398005-sm-r860nzvaksa-423313372',
                'https://images.samsung.com/is/image/samsung/p6pim/levant/galaxy-watch4/gallery/levant-galaxy-watch4-44mm-sm-r870-398004-sm-r870nzsvksa-423313374',
            ],
        ];

        foreach ($images as $slug => $urls) {
            $productId = DB::table('products')->where('slug', $slug)->value('id');
            if (!$productId) continue;
            foreach ($urls as $url) {
                DB::table('product_images')->updateOrInsert(
                    ['product_id' => $productId, 'url' => $url],
                    ['product_id' => $productId, 'url' => $url]
                );
            }
        }
    }
}
