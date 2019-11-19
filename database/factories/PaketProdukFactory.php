<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PaketProduk;
use Faker\Generator as Faker;

$factory->define(PaketProduk::class, function (Faker $faker) {
    return [
        'paket_id'  => \App\Paket::all()->random(),
        'produk_id'  => \App\Produk::all()->unique()->random(),
    ];
});
