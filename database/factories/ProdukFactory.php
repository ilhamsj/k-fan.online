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
        'gayung',
        'tikar',
        'tempat pemakaman',
        'tenda',
        'kursi',
        'keranda'
    ];
    
    return [
        'mitra_id'  => $faker->numberBetween($min = 1, $max = 5),
        'nama'      => Str::title($faker->unique($reset=true)->randomElement($produk)),
        'harga'     => $faker->numberBetween($min = 1000, $max = 9000),
        'kategori'  => $faker->randomElement(['Produk', 'Jasa']),
        'foto'      => 'holder.js/225x281?random=yes&auto=yes&texmode=exact',
    ];
});
