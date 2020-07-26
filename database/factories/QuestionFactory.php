<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'name' => substr($faker->sentence(2), 0, -1),
        'source' => substr($faker->sentence(2), 0, -1),
        'type' => 'single',
        'is_checked' => $faker->boolean(),
        'user_id' => $faker->randomElement(App\User::pluck('id')->toArray()),
        'category_id' => $faker->randomElement(App\Category::pluck('id')->toArray()),
    ];
});
