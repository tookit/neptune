<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\CMS\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'desscription'=>$faker->sentence()
    ];
});
