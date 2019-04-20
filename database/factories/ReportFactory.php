<?php

use App\Report;
use Faker\Generator as Faker;

$factory->define(Report::class, function (Faker $faker) {
    return [
        'name' => $faker->catchPhrase(),
        'content' => $faker->sentence(50),
        'user_id' => function () {
            $user = App\User::inRandomOrder()->first();
            return $user->id;
        },
        'group_id' => function () {
            $group = App\Group::inRandomOrder()->first();
            return $group->id;
        },
    ];
});
