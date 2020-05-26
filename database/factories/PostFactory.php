<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\CMS\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title('en'),
        'description'=>$faker->sentence(),
        'content'=>$faker->sentence(),
    ];
});
