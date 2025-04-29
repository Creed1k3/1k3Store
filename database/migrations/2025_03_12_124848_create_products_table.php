<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Запуск миграции.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');           // Название продукта
            $table->string('manufacturer');    // Производитель
            $table->string('image');           // Ссылка на изображение
            $table->integer('price');          // Цена продукта
            $table->string('category');        // Категория продукта
            $table->json('colors');            // Цвета, сохраняемые как JSON
            $table->text('description');       // Описание продукта
            $table->timestamps();             // Стандартные метки времени
        });
    }

    /**
     * Откат миграции.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
