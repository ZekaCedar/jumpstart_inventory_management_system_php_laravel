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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            // $table->integer('supplier_id');
            // $table->integer('manager_id');
            $table->string('product_name');
            $table->string('product_supplier');
            $table->string('product_category');
            $table->string('product_type');
            $table->string('product_image');
            $table->float('product_price');
            // $table->foreign('supplier_id')->references('id')->on('suppliers');
            // $table->foreign('manager_id')->references('id')->on('employees');
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->foreignId('manager_id')->constrained('employees')->onDelete('cascade');
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
};