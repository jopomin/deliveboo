<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypologyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('typology_user', function (Blueprint $table) {
            $table->unsignedBigInteger('typology_id');
            $table->foreign('typology_id')
            ->references('id')
                ->on('typologies');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            ->references('id')
                ->on('users');

            $table->primary(['typology_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('typology_user');
    }
}
