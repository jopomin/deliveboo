<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyPlacedOrderInOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('in_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('placed_order_id')->after('product_id');

            $table->foreign('placed_order_id')
            ->references('id')
                ->on('placed_orders');
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
            $table->dropForeign('in_orders_placed_order_id_foreign');
            $table->dropColumn('placed_order_id');
        });
    }
}
