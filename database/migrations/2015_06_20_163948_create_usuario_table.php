<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('senha', 60);
            $table->string('cpf', 14);
            $table->string('bairro', 200);
            $table->string('celular', 14);
            $table->string('telefone', 15);
            $table->string('cep', 9);
            $table->string('complemento', 150);
            $table->date('data_nascimento');
            $table->string('endereco', 200);
            $table->string('numero', 15);
            $table->boolean('ativo')->default(false);
            $table->date('data_ativacao');
            $table->integer('cidade_id')->unsigned();
            $table->foreign('cidade_id')->references('id')->on('cidade');
            $table->integer('sexo_id')->unsigned();
            $table->foreign('sexo_id')->references('id')->on('sexo');
            $table->integer('plano_id')->unsigned();
            $table->foreign('plano_id')->references('id')->on('plano');
            $table->string('role', 20);
            $table->rememberToken();
            $table->timestamps();
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
        Schema::drop('usuario');
    }
}
