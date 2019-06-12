<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName,
        'description' => $faker->text,
        'type' => $faker->randomElement(['apartment', 'studio', 'room']),
        'price' => $faker->randomFloat(2, 100, 1000),
        'capacity' => $faker->randomNumber(1),
        'user_id' => 1
    ];
});
