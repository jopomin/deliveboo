<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('reference_name');
            $table->string('address');
            $table->string('vat_number', 11)->unique();
            $table->float('rating', 2, 1)->nullable();
            $table->text('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('reference_name');
            $table->dropColumn('address');
            $table->dropColumn('vat_number');
            $table->dropColumn('rating');
        });
    }
}
