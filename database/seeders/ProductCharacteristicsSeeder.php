<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductCharacteristicsSeeder extends Seeder
{
    public function run()
    {
        // Получаем все продукты из базы
        $products = Product::all();

        foreach ($products as $product) {
            $product->characteristics()->createMany([
                ['name' => 'Размер экрана', 'value' => $this->getRandomScreenSize()],
                ['name' => 'Оперативная память', 'value' => $this->getRandomRam()],
                ['name' => 'Основная камера', 'value' => $this->getRandomCamera()],
                ['name' => 'Тип экрана', 'value' => $this->getRandomScreenType()],
                ['name' => 'Процессор', 'value' => $this->getRandomProcessor()],
                ['name' => 'Разрешение экрана', 'value' => $this->getRandomResolution()],
                ['name' => 'Объем памяти', 'value' => $this->getRandomStorage()],
                ['name' => 'Тип подключения', 'value' => $this->getRandomConnectionType()],
                ['name' => 'Время работы от батареи', 'value' => $this->getRandomBatteryLife()],
                ['name' => 'Поддержка 4K', 'value' => $this->getRandom4KSupport()],
                ['name' => 'Поддержка Wi-Fi', 'value' => $this->getRandomWifiSupport()],
                ['name' => 'Вес', 'value' => $this->getRandomWeight()],
            ]);
        }
    }

    private function getRandomScreenSize()
    {
        $screenSizes = ['5.5 дюймов', '6 дюймов', '6.5 дюймов', '7 дюймов', '15.6 дюймов', '50 дюймов'];
        return $screenSizes[array_rand($screenSizes)];
    }

    private function getRandomRam()
    {
        $ramSizes = ['4 ГБ', '6 ГБ', '8 ГБ', '12 ГБ', '16 ГБ'];
        return $ramSizes[array_rand($ramSizes)];
    }

    private function getRandomCamera()
    {
        $cameras = ['8 МП', '12 МП', '48 МП', '64 МП'];
        return $cameras[array_rand($cameras)];
    }

    private function getRandomScreenType()
    {
        $screenTypes = ['AMOLED', 'LCD', 'LED', 'OLED'];
        return $screenTypes[array_rand($screenTypes)];
    }

    private function getRandomProcessor()
    {
        $processors = ['Exynos 1380', 'Intel Core i5', 'Intel Core i7', 'AMD Ryzen 5', 'Snapdragon 888'];
        return $processors[array_rand($processors)];
    }

    private function getRandomResolution()
    {
        $resolutions = ['HD', 'Full HD', '2K', '4K'];
        return $resolutions[array_rand($resolutions)];
    }

    private function getRandomStorage()
    {
        $storages = ['32 ГБ', '64 ГБ', '128 ГБ', '256 ГБ', '512 ГБ', '1 ТБ'];
        return $storages[array_rand($storages)];
    }

    private function getRandomConnectionType()
    {
        $connectionTypes = ['Wi-Fi', 'Bluetooth', 'USB-C', 'Lightning'];
        return $connectionTypes[array_rand($connectionTypes)];
    }

    private function getRandomBatteryLife()
    {
        $batteryLives = ['10 часов', '12 часов', '15 часов', '30 часов'];
        return $batteryLives[array_rand($batteryLives)];
    }

    private function getRandom4KSupport()
    {
        $support4K = ['Да', 'Нет'];
        return $support4K[array_rand($support4K)];
    }

    private function getRandomWifiSupport()
    {
        $wifiSupport = ['Wi-Fi 4', 'Wi-Fi 5', 'Wi-Fi 6', 'Wi-Fi 6E'];
        return $wifiSupport[array_rand($wifiSupport)];
    }

    private function getRandomWeight()
    {
        $weights = ['100 г', '150 г', '200 г', '300 г', '500 г'];
        return $weights[array_rand($weights)];
    }
}
