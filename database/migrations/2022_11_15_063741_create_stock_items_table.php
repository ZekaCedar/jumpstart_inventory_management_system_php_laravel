<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_items', function (Blueprint $table) {
            $table->id();
            $table->integer('stock_id');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->string('stock_item_name');
            $table->string('stock_image');
            $table->string('stock_item_type');
            $table->string('stock_item_category');
            $table->string('stock_item_brand');
            $table->string('stock_item_price');
            $table->string('stock_item_barcode');
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
        Schema::dropIfExists('stock_items');
    }
};