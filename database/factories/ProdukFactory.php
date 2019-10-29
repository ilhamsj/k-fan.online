<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produk;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Produk::class, function (Faker $faker) {
    $produk = [
        'Mobil Jenazah',
        'Rumah Duka',
        'Peti Mati',
        'Batu Nisan',
        'Bunga Tabur',
        'Tenaga Pemakaman',
        'Karangan Bunga',
        // 'Bongkar Makam',
        // 'Buket Bunga',
        // 'Kain Kafan',
        // 'Kremasi',
        // 'Gali Kubur',
        // 'Rias Jenazah',
        // 'Ngaben – Hindu Bali',
        // 'Rambu Solo’ – Toraja',
        // 'Pembakaran Jenazah dan Potong Jari – Suku Dani'
    ];
    
    return [
        'mitra_id'  => \App\User::all()->random(),
        'nama'      => Str::title($faker->unique($reset=true)->randomElement($produk)),
        'harga'     => $faker->numberBetween($min = 550000, $max = 1500000),
        'kategori'  => $faker->randomElement(['Produk', 'Jasa']),
        // 'foto'      => $faker->imageUrl(225, 325, null, true, $faker->name, true), 
        // 'foto'      => 'holder.js/225x325?auto=yes&random=yes&texmode=exact', 
        'foto'      => 'https://source.unsplash.com/225x325/?funeral,burial,ambulance,flower', 
    ];
});
