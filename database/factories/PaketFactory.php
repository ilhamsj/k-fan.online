<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Paket;
use Faker\Generator as Faker;

$factory->define(Paket::class, function (Faker $faker) {
    return [
        'nama'      => $faker->randomElement(['Bronze', 'Silver', 'Gold', 'Platinum', 'Ultimate']),
        'harga'     => $faker->numberBetween($min = 650000, $max = 15000000),
        'diskon'    => $faker->randomNumber(1),
        'deskripsi' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        // 'foto'      => 'https://source.unsplash.com/348x232/?flower', 
        'foto'      => 'holder.js/348x232?random=yes&auto=yes&texmode=exact',
        // 'foto'      => 'https://source.unsplash.com/348x232/?funeral,grave',
    ];
});
