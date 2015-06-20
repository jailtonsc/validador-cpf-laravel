<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('usuario', function(Blueprint $table)
		{
            //DELETA A COLUNA NAME
            $table->dropColumn('name');

            //CRIA AS COLUNAS ABAIXO
            $table->string('nome', 150)->after('id');
            //$table->string('email', 150)->after('nome');
            $table->string('cpf', 14)->after('email');
            $table->string('bairro', 200)->after('cpf');
            $table->string('celular', 14)->after('bairro');
            $table->string('telefone', 15)->after('celular');
            $table->string('cep', 9)->after('telefone');
            $table->string('complemento', 100)->after('cep');
            $table->date('data_nascimento')->after('complemento');
            $table->string('endereco', 200)->after('data_nascimento');
            $table->string('numero', 15)->after('endereco');
            $table->integer('cidade_id')->after('numero');
            $table->integer('estado_id')->after('cidade_id');
            $table->integer('sexo_id')->after('estado_id');
            $table->string('nome_mae', 200)->after('sexo_id');
            $table->integer('estado_civil_id')->after('nome_mae');
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
		Schema::table('usuario', function(Blueprint $table)
		{
            $table->string('nome');
            //$table->dropColumn('email');
            $table->dropColumn('cpf');
            $table->dropColumn('bairro');
            $table->dropColumn('celular');
            $table->dropColumn('telefone');
            $table->dropColumn('cep');
            $table->dropColumn('complemento');
            $table->dropColumn('data_nascimento');
            $table->dropColumn('endereco');
            $table->dropColumn('numero');
            $table->dropColumn('cidade_id');
            $table->dropColumn('estado_id');
            $table->dropColumn('sexo_id');
            $table->dropColumn('nome_mae');
            $table->dropColumn('estado_civil_id');
		});
	}

}
