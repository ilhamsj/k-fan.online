<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produk;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Produk::class, function (Faker $faker) {
    $produk = [
        'Ambulan',
        'Rumah duka',
        'kain kafan',
        'Buket bunga',
        'Bunga tabur',
        'batu nisan',
        'peti mati',
        'kremasi',
        'Gali Kubur',
        'Rias Jenazah',
        'Bongkar Makam',
        'tempat pemakaman',
        'tenda',
        'kursi',
        'keranda'
    ];
    
    return [
        'mitra_id'  => \App\User::all()->random(),
        'nama'      => Str::title($faker->unique($reset=true)->randomElement($produk)),
        'harga'     => $faker->numberBetween($min = 550000, $max = 1500000),
        'kategori'  => $faker->randomElement(['Produk', 'Jasa']),
        'foto'      => $faker->imageUrl(225, 325, null, true, $faker->name, true), 
    ];
});
