<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Permission as Model;
use Illuminate\Routing\Router;

use Faker\Generator as Faker;

$routes = app()->make(Router::class)->getRoutes();
$paths = collect($routes->getRoutes())->pluck('uri')->toArray();

$factory->define(Model::class, function (Faker $faker) use ($paths) {
    return [
        'name' => uniqid().$faker->name,
        'slug' => uniqid().$faker->slug(),
        'is_system'=> true,
        'guard_name' => 'api',
        'http_methods' => $faker->randomElements(['GET','HEAD','CREATE','PUT','POST','DELETE','OPTION']),
        'http_paths' => $faker->randomElements($paths)
    ];
});
