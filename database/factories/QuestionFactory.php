<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;
use App\User;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'question' => $faker->text(155),
        'created_by' => User::all()->random()->id
    ];
});
