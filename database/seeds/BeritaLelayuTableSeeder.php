<?php

use Illuminate\Database\Seeder;

class BeritaLelayuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\BeritaLelayu::class, 20)->create();
    }
}
