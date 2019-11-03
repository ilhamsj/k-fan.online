<?php

use Illuminate\Database\Seeder;

class ProduksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Produk::class, 100)->create();
    }
}
