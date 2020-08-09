<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $user = \App\Models\User::all()->random();
    return [
        'title' => $faker->unique()->sentence(4, true),
        'content' => $faker->paragraphs(3, true),
        'user_id' => $user->id,
    ];
});
