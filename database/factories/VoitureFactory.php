<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Voiture;
use Faker\Generator as Faker;

$factory->define(Voiture::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(6, true),
        'type' => $faker->sentence(6, true),
        'description' => $faker->sentence(6, true),
        'matricule' => $faker->sentence(6, true),
    ];
});
