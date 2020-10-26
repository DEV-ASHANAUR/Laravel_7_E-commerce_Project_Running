<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id');
            $table->integer('brand_id');
            $table->integer('manufacture_id')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->double('price');
            $table->integer('stock')->nullable();
            $table->double('discount')->nullable();
            $table->double('dis_price')->nullable();
            $table->longText('long_desc')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
