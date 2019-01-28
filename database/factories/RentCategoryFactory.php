<?php

use Faker\Generator as Faker;
use App\RentCategory;

$factory->define(RentCategory::class, function (Faker $faker) {
    return [
        'name'=>ucfirst($faker->word),
        'description'=> $faker->sentence(10)
    ];
});
