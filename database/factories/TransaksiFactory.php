<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaksi;
use Faker\Generator as Faker;

$factory->define(Transaksi::class, function (Faker $faker) {
    $status = ['capture','settlement','pending','deny','expire', 'cancel'];
    return [
        'id'  => $faker->uuid,
        'user_id'  => 1,
        'paket_id'=> \App\Paket::all()->random(),
        'jumlah' => $faker->numberBetween($min = 650000, $max = 15000000),
        'catatan' => $faker->name . ' ' . $faker->randomElement(['wafat gan', 'kasihan nih', 'guling nih mayatnya']),
        'status' => $faker->randomElement($status),
        'snap_token' => $faker->sha1,
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
    ];
});
