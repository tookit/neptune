<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Mediable\Media::class, function (Faker $faker) {
    return [
        'disk' => $faker->randomElement(['local','public']),
        'directory' => $faker->randomElement(['image','text','video','office','other']),
        'filename' => $faker->word.$faker->fileExtension,
        'mime_type' => $faker->mimeType,
        'aggregate_type' => $faker->randomElement(['image','text','video','office','other']),
    ];
});
