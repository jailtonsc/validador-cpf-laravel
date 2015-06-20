<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DelColumnestadoCivilToUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('usuario', function(Blueprint $table)
        {
            $table->dropColumn('estado_civil_id');
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
            $table->integer('estado_civil_id')->references('id')->on('estado_civil');
        });
	}

}
