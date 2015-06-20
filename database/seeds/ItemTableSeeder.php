<?php
/**
 * Created by PhpStorm.
 * User: jailton
 * Date: 09/05/2015
 * Time: 14:02
 */
use \Illuminate\Database\Seeder;
use \Wempregada\Item;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{

    public function run()
    {
        //DB::table('item')->truncate();

        Item::create(['id' => 1, 'nome' => 'Folha de ponto']);
        Item::create(['id' => 2, 'nome' => 'Contracheque']);
        Item::create(['id' => 3, 'nome' => 'Carga Horária']);
        Item::create(['id' => 4, 'nome' => 'Benefício/Desconto']);
        Item::create(['id' => 5, 'nome' => 'Ocorrência']);
        Item::create(['id' => 7, 'nome' => 'Empregado(s)']);
        Item::create(['id' => 9, 'nome' => 'Férias']);
        Item::create(['id' => 10, 'nome' => 'Décimo Terceiro']);

    }
}
