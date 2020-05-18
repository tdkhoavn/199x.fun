<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Event;
use App\Models\EventType;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'start_date' => $faker->dateTimeBetween($startDate = '-1 month', $endDate = 'now', $timezone = null),
        'created_by' => $faker->numberBetween($min = 1, $max = 10),
        'member_id'  => $faker->randomElements($array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10), $count = 3),
        'type_id'    => EventType::inRandomOrder()->first()->id,
        'total'      => $faker->numberBetween($min = 50000, $max = 10000),
        'note'       => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});
