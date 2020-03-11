<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'ime' => $faker->sentence(2),
        'opis_artikla' => $faker->sentence(20),
        'cijena' => $faker->numberBetween(1, 1000),
        'akcijska_cijena' => $faker->numberBetween(1, 100),
        'category_id' => $faker->numberBetween(1, 2)
    ];
});
