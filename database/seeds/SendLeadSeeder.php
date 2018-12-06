<?php

use Illuminate\Database\Seeder;

class SendLeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Lead::send();
    }
}
