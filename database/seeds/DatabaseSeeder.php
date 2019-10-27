<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ProduksTableSeeder::class);
        // $this->call(PaketsTableSeeder::class);
        // $this->call(PaketProduksTableSeeder::class);
        // $this->call(TransaksisTableSeeder::class);
        // $this->call(BeritaLelayuTableSeeder::class);
    }
}
