<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('ItemTableSeeder');
        $this->call('PlanoTableSeeder');
        $this->call('PlanoItemTableSeeder');
        $this->call('SexoTableSeeder');

        Model::reguard();
    }
}
