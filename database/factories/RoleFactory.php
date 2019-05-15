<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Role as Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->slug(),
    ];
});
