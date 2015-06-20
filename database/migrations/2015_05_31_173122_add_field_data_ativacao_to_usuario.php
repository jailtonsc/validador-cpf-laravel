<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldDataAtivacaoToUsuario extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('usuario', function(Blueprint $table)
        {
            $table->date('data_ativacao')->nullable();
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
            $table->dropColumn('data_ativacao');
        });
	}

}
