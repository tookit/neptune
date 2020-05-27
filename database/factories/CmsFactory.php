<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\CMS\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description'=>$faker->sentence()
    ];
});

$factory->define(App\Models\CMS\Menu::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'uri' => $faker->url(),
        'icon' => $faker->imageUrl(),
        'sort_number' => $faker->randomDigit,
        'is_active' => $faker->boolean

    ];
});

$factory->define(\App\Models\CMS\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title('en'),
        'description'=>$faker->sentence(),
        'content'=>$faker->sentence(),
    ];
});


$factory->define(\App\Models\CMS\Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description'=>$faker->sentence()
    ];
});
