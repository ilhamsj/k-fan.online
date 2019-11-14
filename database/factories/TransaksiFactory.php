<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaksi;
use Faker\Generator as Faker;

$factory->define(Transaksi::class, function (Faker $faker) {
    // $status = ['challange', 'capture','settlement','pending','deny','expire', 'cancel'];
    $status = ['challange', 'capture','settlement'];
    return [
        'id'  => $faker->uuid,
        'user_id'  => 1,
        'paket_id'=> \App\Paket::all()->random(),
        'jumlah' => $faker->numberBetween($min = 650000, $max = 15000000),
        'catatan' => $faker->name . ' ' . $faker->randomElement(['wafat gan', 'kasihan nih', 'guling nih mayatnya']),
        'status' => $faker->randomElement($status),
        'snap_token' => $faker->sha1,
        // 'created_at' => $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now'),
        // 'created_at' => $faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now'),
        'created_at' => $faker->dateTimeBetween($startDate = '-12 month', $endDate = 'now'),
    ];
});
