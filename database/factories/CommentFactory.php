<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $user = \App\Models\User::all()->random();
    return [
        'content' => $faker->paragraphs(2, true),
        'user_id' => $user->id,
        'post_id' => null,
        'comment_id' => null,
    ];
});
