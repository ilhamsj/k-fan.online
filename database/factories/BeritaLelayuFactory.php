<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BeritaLelayu;
use Faker\Generator as Faker;

$factory->define(BeritaLelayu::class, function (Faker $faker) {

    return [
        'transaksi_id'      => \App\Transaksi::all()->random(), 
        'nama'              => $faker->name, 
        'alamat'            => $faker->address, 
        'surat_kematian'    => $faker->imageUrl(225, 281, null, true, 'Kafan', true), 
        'foto'              => $faker->imageUrl(225, 281, 'cats', true, $faker->name, true), 
        'lahir'             => $faker->dateTime($max = 'now', $timezone = null), 
        'wafat'             => $faker->dateTime($max = 'now', $timezone = null), 
    ];
});
