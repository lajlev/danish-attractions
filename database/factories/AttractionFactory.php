<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Attraction;
use Faker\Generator as Faker;

$factory->define(Attraction::class, function (Faker $faker) {
    return [
        'name' => $faker->streetName,
        'description' => $faker->paragraph(),
        'url_gmap' => $faker->url,
        'lat' => $faker->latitude,
        'lng' => $faker->longitude
    ];
});
