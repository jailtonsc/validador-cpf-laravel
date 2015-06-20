<?php

use Illuminate\Database\Seeder;
use Wempregada\Sexo;
use Illuminate\Support\Facades\DB;

class SexoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('sexo')->truncate();

        Sexo::create(['id' => 1, 'nome' => 'Masculino']);
        Sexo::create(['id' => 2, 'nome' => 'Feminino']);
    }
}
