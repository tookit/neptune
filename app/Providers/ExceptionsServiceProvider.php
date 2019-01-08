<?php

namespace App\Providers;


use App\Exceptions\Handler;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class ExceptionsServiceProvider - Hacky?!
 * @package App\Providers
 */
class ExceptionsServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot(){}

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {



    }
}