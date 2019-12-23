<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->sentence();
    $slug = str_slug($name);

    return [
        'name' => $name,
        'slug' => $slug,
        'description' => $faker->text
    ];
});
