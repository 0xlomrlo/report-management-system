<?php

use App\Report;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {
        return [
            'name' => $faker->catchPhrase(),
            'content' => $faker->sentence(50),
            'user_id' => $faker->numberBetween(1, 50),
            'group_id' => $faker->numberBetween(1, 50),
        ];
});
