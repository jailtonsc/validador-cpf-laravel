<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DelColumnnomeMaeToUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('usuario', function(Blueprint $table)
        {
            $table->dropColumn('nome_mae');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('usuario', function(Blueprint $table)
        {
            $table->string('nome_mae', 200);
        });
	}

}
