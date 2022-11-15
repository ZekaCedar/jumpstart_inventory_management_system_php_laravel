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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('product_id');
            $table->string('stock_product');
            $table->string('stock_image');
            $table->string('stock_item_type');
            $table->string('stock_item_category');
            $table->string('stock_item_brand');
            $table->string('stock_item_barcode');
            $table->string('stock_location');
            $table->string('selling_price');
            $table->string('purchase_price');
            $table->string('stock_quantity');
            $table->tinyInteger('stock_status')->default('0');
            $table->string('stock_message')->nullable();
            $table->string('safety_stock')->nullable();
            $table->string('reorder_point')->nullable();
            $table->string('economic_order_quantity')->nullable();
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
        Schema::dropIfExists('stocks');
    }
};