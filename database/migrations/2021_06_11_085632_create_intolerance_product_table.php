<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntoleranceProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intolerance_product', function (Blueprint $table) {
            $table->unsignedBigInteger('intolerance_id');
            $table->foreign('intolerance_id')
            ->references('id')
                ->on('intolerances');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')
            ->references('id')
                ->on('products');

            $table->primary(['intolerance_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('intolerance_product');
    }
}
