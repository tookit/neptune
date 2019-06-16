<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Mediable\Media::class, function (Faker $faker) {
    return [
        'disk' => 'public',
        'directory' => $faker->randomElement(['image','text','video','doc','other']),
        'filename' => $faker->word.$faker->fileExtension,
        'extension' => $faker->fileExtension,
        'mime_type' => $faker->mimeType,
        'size' => $faker->randomDigit,
        'aggregate_type' => $faker->randomElement(['image','text','video','doc','other']),
    ];
});
