<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
            'name' => $faker->name,
            'description' => $faker->text,
            'weight' => $faker->numberBetween(1,10),
            'price' => $faker->numberBetween(1,1000),
            'special_price' => $faker->numberBetween(1,1000),
            'status' => $faker->boolean,
            'featured' => $faker->boolean,
            'quantity' => $faker->numberBetween(0, 100),
            'brand_id' => $faker->numberBetween(1,10),
    ];
});
