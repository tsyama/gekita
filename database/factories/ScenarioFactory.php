<?php

use Faker\Generator as Faker;

$factory->define(App\Scenario::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'body' => $faker->paragraph(20),
    ];
});
