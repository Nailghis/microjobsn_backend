<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;
use App\User;
use App\Models\Question;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        //
        'comment' => $faker->text(155),
        'question_id' => Question::all()->random()->id,
        'created_by' => User::all()->random()->id
    ];
});
