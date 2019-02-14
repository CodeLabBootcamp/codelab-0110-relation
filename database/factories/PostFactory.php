<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        "title" => $faker->sentence,
        "content" => $faker->paragraph,
        "writer_id" => $faker->numberBetween(1, 2),
        "image" => "https://codelab.camp/logo.png",
        "published" => $faker->boolean()
    ];
});
