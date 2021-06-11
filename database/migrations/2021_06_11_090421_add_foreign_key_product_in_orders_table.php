<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyProductInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('in_orders', function (Blueprint $table) {
                $table->unsignedBigInteger('product_id')->after('id');

                $table->foreign('product_id')
                ->references('id')
                    ->on('products');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('in_orders', function (Blueprint $table) {
            $table->dropForeign('in_orders_product_id_foreign');
            $table->dropColumn('product_id');
        });
    }
}
