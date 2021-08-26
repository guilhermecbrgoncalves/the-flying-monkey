<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Logbook;
use Faker\Generator as Faker;

$factory->define(Logbook::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,50),
        'date' => $faker->date('Y-m-d','now'),
        'aircraft' => $faker->name,
        'departure_time' => $faker->time('H:i:s', 'now'),
        'departure_place' => $faker->suffix,
        'arrival_time' => $faker->time('H:i:s', 'now'),
        'arrival_place' => $faker->suffix,
        'total_flight_time' => $faker->time('H:i:s', 'now'),
        'take_offs' => 3,
        'landings' => 3,
        'type_of_flight' => 'VFR',
        'notes' => $faker->text(200)
    ];
});
