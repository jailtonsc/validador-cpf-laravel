<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanoItemsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plano_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plano_id')->unsigned();
            $table->foreign('plano_id')->references('id')->on('plano');
            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('item');
            $table->integer('quantidade')->nullable();
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
        Schema::drop('plano_item');
    }

}
