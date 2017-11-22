<?php

use Faker\Generator as Faker;
use App\Player;

$factory->define(Player::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'about' => $faker->realText(200),
    ];
});
