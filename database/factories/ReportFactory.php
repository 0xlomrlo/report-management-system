<?php

use App\Report;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {
        return [
            'name' => $faker->catchPhrase(),
            'content' => $faker->sentence(50),
            'user_id' => rand(1, 20),
        ];
});
