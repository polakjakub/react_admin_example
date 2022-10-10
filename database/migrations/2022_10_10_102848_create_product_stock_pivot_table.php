<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStockPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stock', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('stock_id')->index();
            $table->foreign('stock_id')->references('id')->on('stocks')->onDelete('cascade');
            $table->primary(['product_id', 'stock_id']);
            $table->integer('quantity')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_stock');
    }
}
