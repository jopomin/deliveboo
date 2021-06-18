<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacedOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('placed_order_product', function (Blueprint $table) {
            $table->unsignedBigInteger('placed_order_id');
            $table->foreign('placed_order_id')
            ->references('id')
                ->on('placed_orders');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
            ->references('id')
                ->on('products');

            $table->primary(['placed_order_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('placed_order_product');
    }
}
