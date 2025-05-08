<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->decimal('old_price', 10, 2)->nullable();
            $table->string('sku')->unique()->nullable(); // артикул (SKU)
            $table->string('slug')->unique()->nullable(); // слаг (URL)
            $table->string('image')->nullable(); // главное изображение
            $table->timestamps();
        });
    }
    

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
