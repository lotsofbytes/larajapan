<?php

use Faker\Generator as Faker;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
       'type'    => $faker->randomElement(['自宅', '会社']),
       'address' => $faker->address
    ];
});
