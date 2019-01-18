<?php

use Faker\Generator as Faker;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
       'type'    => $faker->randomElement(['work', 'home']),
	   'address' => $faker->address
    ];
});
