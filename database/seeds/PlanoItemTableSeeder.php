<?php
/**
 * Created by PhpStorm.
 * User: jailton
 * Date: 09/05/2015
 * Time: 14:02
 */
use \Illuminate\Database\Seeder;
use \Wempregada\PlanoItem;
use Illuminate\Support\Facades\DB;

class PlanoItemTableSeeder extends Seeder
{

    public function run()
    {
        //DB::table('plano_item')->truncate();

        PlanoItem::create(['plano_id' => 1, 'item_id' => 7, 'quantidade' => 1]);
        PlanoItem::create(['plano_id' => 1, 'item_id' => 1, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 1, 'item_id' => 2, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 1, 'item_id' => 3, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 1, 'item_id' => 4, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 1, 'item_id' => 5, 'quantidade' => 0]);

        PlanoItem::create(['plano_id' => 2, 'item_id' => 7, 'quantidade' => 10]);
        PlanoItem::create(['plano_id' => 2, 'item_id' => 1, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 2, 'item_id' => 2, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 2, 'item_id' => 3, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 2, 'item_id' => 4, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 2, 'item_id' => 5, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 2, 'item_id' => 9, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 2, 'item_id' => 10, 'quantidade' => 0]);

        PlanoItem::create(['plano_id' => 3, 'item_id' => 7, 'quantidade' => null]);
        PlanoItem::create(['plano_id' => 3, 'item_id' => 1, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 3, 'item_id' => 2, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 3, 'item_id' => 3, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 3, 'item_id' => 4, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 3, 'item_id' => 5, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 3, 'item_id' => 9, 'quantidade' => 0]);
        PlanoItem::create(['plano_id' => 3, 'item_id' => 10, 'quantidade' => 0]);
    }
}
