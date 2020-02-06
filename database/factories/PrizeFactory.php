<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Prize;
use Faker\Generator as Faker;

$factory->define(Prize::class, function (Faker $faker) {
    return [
        'name' => ucwords($faker->domainWord),
    ];
});

$factory->state(Prize::class, 'hasWinner', function (Faker $faker) {
    return [
        'name' => ucwords($faker->domainWord),
    ];
});

$factory->afterCreatingState(Prize::class, 'hasWinner', function ($prize, $faker) {
    $contestant = factory(App\Contestant::class)->create(
        ['contest_id' => $prize->contest_id]
    );

    $prize->update(['contestant_id' => $contestant->id]);
});
