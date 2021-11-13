<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Opportunity;
use Faker\Generator as Faker;
use App\Models\Lookups\Category;
use App\Models\Lookups\Country;
use App\User;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Opportunity::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(15, true),
        'description' => $faker->text(500),
        'category_id' => Category::all()->random()->id,
        'country_id' => Country::all()->random()->id,
        'deadline' => $faker->dateTime(),
        'organizer' => $faker->company,
        'created_by'=> User::all()->random()->id    ];
});
