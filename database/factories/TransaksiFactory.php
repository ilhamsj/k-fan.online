<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaksi;
use Faker\Generator as Faker;

$factory->define(Transaksi::class, function (Faker $faker) {
    return [
        'id'  => $faker->uuid,
        'user_id'  => \App\User::all()->random(),
        'paket_id'=> \App\Paket::all()->random(),
        'jumlah' => $faker->numberBetween($min = 650000, $max = 15000000),
        'catatan' => $faker->name . ' ' . $faker->randomElement(['wafat gan', 'kasihan nih', 'guling nih mayatnya']),
        'status' => $faker->randomElement(['accept', 'challenge', 'deny']),
        'snap_token' => $faker->sha1,
    ];
});
