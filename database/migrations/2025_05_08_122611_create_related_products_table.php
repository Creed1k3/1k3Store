<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelatedProductsTable extends Migration
{
    public function up()
    {
        Schema::create('related_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('related_product_id')->constrained('products');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('related_products');
    }
}
