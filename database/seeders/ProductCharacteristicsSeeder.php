<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Faker\Factory as Faker;

class ProductCharacteristicsSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $productIds = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]; // ID товаров

        foreach ($productIds as $productId) {
            DB::table('product_characteristics')->insert([
                ['product_id' => $productId, 'name' => 'Размер экрана', 'value' => $this->getRandomScreenSize()],
                ['product_id' => $productId, 'name' => 'Оперативная память', 'value' => $this->getRandomRam()],
                ['product_id' => $productId, 'name' => 'Основная камера', 'value' => $this->getRandomCamera()],
                ['product_id' => $productId, 'name' => 'Тип экрана', 'value' => $this->getRandomScreenType()],
                ['product_id' => $productId, 'name' => 'Процессор', 'value' => $this->getRandomProcessor()],
                ['product_id' => $productId, 'name' => 'Разрешение экрана', 'value' => $this->getRandomResolution()],
                ['product_id' => $productId, 'name' => 'Объем памяти', 'value' => $this->getRandomStorage()],
                ['product_id' => $productId, 'name' => 'Тип подключения', 'value' => $this->getRandomConnectionType()],
                ['product_id' => $productId, 'name' => 'Время работы от батареи', 'value' => $this->getRandomBatteryLife()],
                ['product_id' => $productId, 'name' => 'Поддержка 4K', 'value' => $this->getRandom4KSupport()],
                ['product_id' => $productId, 'name' => 'Поддержка Wi-Fi', 'value' => $this->getRandomWifiSupport()],
                ['product_id' => $productId, 'name' => 'Вес', 'value' => $this->getRandomWeight()],
                // Добавьте другие случайные характеристики
            ]);
        }
    }

    // Генерация случайных размеров экрана
    private function getRandomScreenSize()
    {
        $screenSizes = ['5.5 дюймов', '6 дюймов', '6.5 дюймов', '7 дюймов', '15.6 дюймов', '50 дюймов'];
        return $screenSizes[array_rand($screenSizes)];
    }

    // Генерация случайной оперативной памяти
    private function getRandomRam()
    {
        $ramSizes = ['4 ГБ', '6 ГБ', '8 ГБ', '12 ГБ', '16 ГБ'];
        return $ramSizes[array_rand($ramSizes)];
    }

    // Генерация случайных характеристик камеры
    private function getRandomCamera()
    {
        $cameras = ['8 МП', '12 МП', '48 МП', '64 МП'];
        return $cameras[array_rand($cameras)];
    }

    // Генерация случайного типа экрана
    private function getRandomScreenType()
    {
        $screenTypes = ['AMOLED', 'LCD', 'LED', 'OLED'];
        return $screenTypes[array_rand($screenTypes)];
    }

    // Генерация случайных процессоров
    private function getRandomProcessor()
    {
        $processors = ['Exynos 1380', 'Intel Core i5', 'Intel Core i7', 'AMD Ryzen 5', 'Snapdragon 888'];
        return $processors[array_rand($processors)];
    }

    // Генерация случайных разрешений экрана
    private function getRandomResolution()
    {
        $resolutions = ['HD', 'Full HD', '2K', '4K'];
        return $resolutions[array_rand($resolutions)];
    }

    // Генерация случайного объема памяти
    private function getRandomStorage()
    {
        $storages = ['32 ГБ', '64 ГБ', '128 ГБ', '256 ГБ', '512 ГБ', '1 ТБ'];
        return $storages[array_rand($storages)];
    }

    // Генерация случайного типа подключения
    private function getRandomConnectionType()
    {
        $connectionTypes = ['Wi-Fi', 'Bluetooth', 'USB-C', 'Lightning'];
        return $connectionTypes[array_rand($connectionTypes)];
    }

    // Генерация случайного времени работы от батареи
    private function getRandomBatteryLife()
    {
        $batteryLives = ['10 часов', '12 часов', '15 часов', '30 часов'];
        return $batteryLives[array_rand($batteryLives)];
    }

    // Генерация случайной поддержки 4K
    private function getRandom4KSupport()
    {
        $support4K = ['Да', 'Нет'];
        return $support4K[array_rand($support4K)];
    }

    // Генерация случайной поддержки Wi-Fi
    private function getRandomWifiSupport()
    {
        $wifiSupport = ['Wi-Fi 4', 'Wi-Fi 5', 'Wi-Fi 6', 'Wi-Fi 6E'];
        return $wifiSupport[array_rand($wifiSupport)];
    }

    // Генерация случайного веса
    private function getRandomWeight()
    {
        $weights = ['100 г', '150 г', '200 г', '300 г', '500 г'];
        return $weights[array_rand($weights)];
    }
}
