<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Routing\Router;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;
use Symfony\Component\Yaml\Yaml;

class ApiExplorer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:doc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate swagger doc';

    /**
     * An array of all the registered routes.
     *
     * @var \Illuminate\Routing\RouteCollection
     */
    protected $routes;


    protected $pathFile;

    protected $produce = ["application/json"];

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Router $router)
    {
        parent::__construct();
        $this->routes = $router->getRoutes();
        $this->pathFile = base_path('/docs/path.yml');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $paths = Yaml::parseFile($this->pathFile) ?? [];
        collect($this->routes)->each(function (Route $route) use ( & $paths) {
            if(in_array('api',$route->middleware())){
                $this->getReturnType($route);
                $methods = $route->methods();
                $uri = $route->uri();
                $method = $methods[0];
                $name = $route->getAction('desc') ?? ltrim($route->getActionName(), '\\');
                $uriOption = [
                    "description"  => $name,
                    "operationId" => Str::camel($name),
                    "produces" => $this->produce,
                ];
                if($route->parameterNames()){
                    $uriOption['parameters'] = [
                        [
                            'name' => 'id',
                            'in' => 'path'
                        ]
                    ];
                }
                $paths[$uri][$method]  = $uriOption;
            }

        });
        $yaml = Yaml::dump($paths,6);
        file_put_contents($this->pathFile, $yaml);
    }


    protected function getReturnType(Route $route)
    {
        $reflectionMethod = new \ReflectionMethod($route->getController(),$route->getActionMethod());
        $resource = $reflectionMethod->getReturnType()->getName();
        $model = call_user_func([$resource,'model']);
        $instance = factory($model)->make();
//        $resourceInstance = call_user_func([$resource,'make'],$instance);
//        dd($resourceInstance->response());
//        $builder = $instance->getConnection()->getSchemaBuilder();
//        $columns = $builder->getColumnListing($instance->getTable());
        return $columns;
    }

}
