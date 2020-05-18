<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EventType;
use Faker\Generator as Faker;

$factory->define(EventType::class, function (Faker $faker) {
    return [
        'name'       => $faker->city,
        'color'      => $faker->hexcolor,
        'created_by' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
