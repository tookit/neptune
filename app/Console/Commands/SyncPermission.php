<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Routing\Router;
use Illuminate\Routing\Route;
use App\Models\Permission;

class SyncPermission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'permission:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync permissions by routes';

    /**
     * An array of all the registered routes.
     *
     * @var \Illuminate\Routing\RouteCollection
     */
    protected $routes;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Router $router)
    {
        parent::__construct();

        $this->routes = $router->getRoutes();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {


        collect($this->routes)->each(function (Route $route){

            if($route->getPrefix()){

                $slug = $route->getName() ??ltrim($route->getActionName(), '\\');
                $name = $route->getAction('desc') ?? ltrim($route->getActionName(), '\\');
                Permission::updateOrCreate(['slug'=>$slug],[
                    'name'=> $name,
                    'slug'=>  $slug,
                    'http_methods'=> $route->methods(),
                    'http_paths'=>[$route->uri()],
                    'guard_name'=>'api'
                ]);
            }

        });
        $this->info('Permission synced.');

    }

    /**
     * Get the route information for a given route.
     *
     * @param  \Illuminate\Routing\Route  $route
     * @return array
     */
    protected function getRouteInformation(Route $route)
    {
        return [
            'domain' => $route->domain(),
            'method' => implode('|', $route->methods()),
            'uri'    => $route->uri(),
            'name'   => $route->getName(),
            'action' => ltrim($route->getActionName(), '\\'),
            'middleware' => $this->getMiddleware($route),
        ];
    }

    /**
     * Filter the route by URI and / or name.
     *
     * @param  array  $route
     * @return array|null
     */
    protected function filterRoute(array $route)
    {
        if (($this->option('name') && ! Str::contains($route['name'], $this->option('name'))) ||
            $this->option('path') && ! Str::contains($route['uri'], $this->option('path')) ||
            $this->option('method') && ! Str::contains($route['method'], strtoupper($this->option('method')))) {
            return;
        }

        return $route;
    }


    /**
     * Get before filters.
     *
     * @param  \Illuminate\Routing\Route  $route
     * @return string
     */
    protected function getMiddleware($route)
    {
        return collect($route->gatherMiddleware())->map(function ($middleware) {
            return $middleware instanceof Closure ? 'Closure' : $middleware;
        })->implode(',');
    }
}
