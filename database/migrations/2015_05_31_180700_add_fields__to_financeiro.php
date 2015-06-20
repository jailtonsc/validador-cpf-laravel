<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToFinanceiro extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('financeiro', function(Blueprint $table)
        {
            $table->double('valor');
            $table->double('valor_pago')->nullable();;
            $table->date('data_vencimento');
            $table->date('data_pagamento')->nullable();;
            $table->integer('plano_id')->unsigned();
            $table->foreign('plano_id')->references('id')->on('plano');
            $table->softDeletes();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('financeiro', function(Blueprint $table)
        {
            $table->dropColumn('valor');
            $table->dropColumn('valor_pago');
            $table->dropColumn('data_vencimento');
            $table->dropColumn('data_pagamento');
            $table->dropColumn('plano_id')->unsigned();
            $table->dropSoftDeletes();
        });
	}

}
