<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PaketProduk;
use Faker\Generator as Faker;

$factory->define(PaketProduk::class, function (Faker $faker) {
    return [
        'paket_id'  => $faker->numberBetween($min = 1, $max = 4),
        'produk_id'  => $faker->unique()->numberBetween($min = 1, $max = 20),
    ];
});
