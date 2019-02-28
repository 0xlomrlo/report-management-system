<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;



$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName,
        'password' => bcrypt('secret'),
        'remember_token' => Str::random(10),
    ];
});
