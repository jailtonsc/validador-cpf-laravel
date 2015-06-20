<?php
/**
 * Created by PhpStorm.
 * User: jailton
 * Date: 09/05/2015
 * Time: 14:02
 */
use \Illuminate\Database\Seeder;
use \Wempregada\Plano;
use Illuminate\Support\Facades\DB;

class PlanoTableSeeder extends Seeder
{

    public function run()
    {
        //DB::table('plano')->truncate();

        Plano::create(['id' => 1, 'nome' => 'Básico', 'descricao' => 'teste', 'valor' => '14.90', 'destaque' => FALSE]);
        Plano::create(['id' => 2, 'nome' => 'Profissional', 'descricao' => 'teste', 'valor' => '19.90', 'destaque' => TRUE]);
        Plano::create(['id' => 3, 'nome' => 'Empresarial', 'descricao' => 'teste', 'valor' => '29.90', 'destaque' => FALSE]);
    }
}
