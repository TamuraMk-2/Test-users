<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\TestUser;
use Faker\Generator as Faker;

$factory->define(TestUser::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'content' => $faker->realText
    ];
});
