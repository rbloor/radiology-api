<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
        'notes' => $faker->text(),
        'is_correct' => $faker->boolean(),
        'question_id' => $faker->randomElement(App\Question::pluck('id')->toArray()),
    ];
});
