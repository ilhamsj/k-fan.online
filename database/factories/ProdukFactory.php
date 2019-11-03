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

    $foto = ['3-columns (1).jpg','3-columns (2).jpg','3-columns (3).jpg','3-columns (4).jpg','3-columns (5).jpg','photo-1561126841-3e34af7b2804.jpg','photo-1455819760800-d2aa223b237a.jpg','photo-1492409678553-da87ed48ffee.jpg','photo-1498579687545-d5a4fffb0a9e.jpg'];
    
    return [
        'mitra_id'  => \App\User::all()->random(),
        'nama'      => Str::title($faker->unique($reset=true)->randomElement($produk)),
        'harga'     => $faker->numberBetween($min = 550000, $max = 1500000),
        'kategori'  => $faker->randomElement(['Produk', 'Jasa']),
        'foto'  => 'https://k-fan.test/images/'.$faker->randomElement($foto),
        // 'foto'      => $faker->imageUrl(225, 325, null, true, $faker->name, true), 
        // 'foto'      => 'holder.js/225x325?auto=yes&random=yes&texmode=exact', 
        // 'foto'      => 'https://source.unsplash.com/225x325/?funeral,burial,ambulance,flower', 
    ];
});
