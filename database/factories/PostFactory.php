<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'content' => $faker->paragraphs(5, true),
        'category_id' => $faker->numberBetween(1,3),
        'user_id' => $faker->numberBetween(1,2),
    ];
});