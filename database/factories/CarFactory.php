<?php
//use App\Car;
use Faker\Generator as Faker;

$factory->define(App\Car::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'size' => $faker->numberBetween($min = 1, $max = 10),
        'luggage' => $faker->numberBetween($min = 1, $max = 10),
        'fair' => $faker->numberBetween($min = 50, $max = 100),
        'description' => $faker->sentences($nb = 3, $asText = true) ,
        'status' => $faker->boolean,
    ];
});
