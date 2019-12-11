<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\post;
use Faker\Generator as Faker;

$factory->define(post::class, function (Faker $faker) {

    $title = $faker->sentence();
    $slug = str_slug($title);

    return [
        'title' => $title,
        'slug' => $slug,
        'description' => $faker->text,
        'image' => $faker->text,
    ];
});
