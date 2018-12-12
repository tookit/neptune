<?php

namespace App\Listeners;


use Illuminate\Foundation\Http\Events\RequestHandled;
use Illuminate\Support\Facades\DB;


class AddDBQueryLogToResponse
{
    public function handle(RequestHandled $event)
    {

        // only for the old response
        if(get_class($event->response) === 'Illuminate\Http\JsonResponse'){


            $data = $event->response->getData();
            if(!empty($data) && env('APP_DEBUG') === 'local')
            {
                $data->DBQuery = $this->getQueryLog();
                $event->response->setData($data);
            }
        }

    }


    protected function getQueryLog()
    {
        $queries = [];
        foreach(DB::getQueryLog() as $item)
        {
            $query  = array_get($item,'query');
            $bindings = array_get($item,'bindings');
            $time = array_get($item,'time');

            if (! empty($bindings)) {
                $query = vsprintf(
                // Replace pdo bindings to printf string bindings escaping % char.
                    str_replace(['%', '?'], ['%%', "'%s'"], $query),
                    // Convert all query attributes to strings.
                    $this->normalizeQueryAttributes($bindings)
                );
            }
            // Finish query with semicolon.
            $query = rtrim($query, ';') . ';';

            $queries[] = [

                'query' => $query,
                'time' => $time
            ];
        }
        return $queries;

    }


    /**
     * Be sure that all attributes sent to DB layer are strings.
     *
     * @param  array $attributes
     * @return array
     */
    protected function normalizeQueryAttributes(array $attributes)
    {
        $result = [];
        foreach ($attributes as $attribute) {
            $result[] = $this->convertAttribute($attribute);
        }
        return $result;
    }


    /**
     * Convert attribute to string.
     *
     * @param  mixed $attribute
     * @return string
     */
    protected function convertAttribute($attribute)
    {
        try {
            return (string) $attribute;
        } catch (\Exception $e) {
            switch (true) {
                // Handle DateTime attribute pass.
                case $attribute instanceof \DateTime:
                    return $attribute->format('Y-m-d H:i:s');
                // Handle callables.
                case $attribute instanceof \Closure:
                    return $this->convertAttribute($attribute());
                // Handle arrays using json by default or print_r if error occurred.
                case is_array($attribute):
                    $json = json_encode($attribute);
                    return json_last_error() === JSON_ERROR_NONE
                        ? $json
                        : print_r($attribute);
                // Handle all other object.
                case is_object($attribute):
                    return get_class($attribute);
                // For all unknown.
                default:
                    return '?';
            }
        }
    }

}