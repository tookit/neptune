<?php

namespace Tookit\CMS;

use Illuminate\Support\ServiceProvider;

class CMSServiceProvider extends ServiceProvider
{


    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

        $this->loadMigrationsFrom(__DIR__.'/path/to/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes.php');

//        $this->publishes([
//            __DIR__.'/path/to/config/courier.php' => config_path('courier.php'),
//        ]);
    }


    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
//        $this->mergeConfigFrom(
//            __DIR__.'/path/to/config/courier.php', 'courier'
//        );
    }
}