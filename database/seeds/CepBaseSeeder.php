<?php

use Illuminate\Database\Seeder;

class CepBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\AtendimentoNet::upBase();
    }
}
