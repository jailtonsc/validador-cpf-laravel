<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateForeignkeysToUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usuario', function(Blueprint $table)
		{
           $table->foreign('cidade_id')->references('id')->on('cidade');
            $table->foreign('estado_id')->references('id')->on('estado');
            $table->foreign('sexo_id')->references('id')->on('sexo');
            $table->foreign('estado_civil_id')->references('id')->on('estado_civil');
            $table->foreign('plano_id')->references('id')->on('plano');
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
			$table->dropForeign('cidade_id');
            $table->dropForeign('estado_id');
            $table->dropForeign('sexo_id');
            $table->dropForeign('estado_civil_id');
            $table->dropForeign('plano_id');
		});
	}

}
