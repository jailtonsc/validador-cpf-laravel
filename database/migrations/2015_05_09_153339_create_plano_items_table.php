<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanoItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plano_items', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('plano_id')->unsigned();
            $table->foreign('plano_id')->references('id')->on('planos');
            $table->integer('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('items');
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
		Schema::drop('plano_items');
	}

}
