<?php

use Illuminate\Database\Seeder;

class PaketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Paket::class, 4)->create();
    }
}
