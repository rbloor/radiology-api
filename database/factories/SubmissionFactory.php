<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Submission;
use Faker\Generator as Faker;

$factory->define(Submission::class, function (Faker $faker) {
    return [
      'user_id' => $faker->randomElement(App\User::pluck('id')->toArray()),
      'question_id' => $faker->randomElement(App\Question::pluck('id')),
      'is_correct' => $faker->boolean()   
    ];
});
