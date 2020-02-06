<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contestant;
use Faker\Generator as Faker;

$factory->define(Contestant::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName . ' ' . $faker->lastName,
    ];
});
