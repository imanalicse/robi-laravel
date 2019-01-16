<?php

use Faker\Generator as Faker;

$factory->define(App\Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10),
        'description' => $faker->text(100),
        'poster_url' => 'placeholder.jpg'
    ];
});
