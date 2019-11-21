<?php

use Illuminate\Database\Seeder;

class TransaksisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Transaksi::class, 200)->create();
    }
}
