<?php

namespace App\Listeners;


use Illuminate\Foundation\Http\Events\RequestHandled;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;


class AddDBQueryLogToResponse
{
    public function handle(RequestHandled $event)
    {

        if(env('APP_ENV') === 'local')
        {
            $data = $this->getResponseData($event->response);
            $data['debug']['queries'] = $this->getQueryLog();
            $this->setResponseData($event->response,$data);
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
     * Fetches the contents of the response and parses them to an assoc array
     *
     * @param Response $response
     * @return array|bool
     */
    protected function getResponseData(Response $response)
    {
        if ($response instanceof JsonResponse) {
            /** @var $response JsonResponse */
            return $response->getData(true) ?: [];
        }
        $content = $response->getContent();
        return json_decode($content, true) ?: false;
    }
    /**
     * Updates the response content
     *
     * @param Response $response
     * @param array    $data
     * @return JsonResponse|Response
     */
    protected function setResponseData(Response $response, array $data)
    {
        if ($response instanceof JsonResponse) {
            /** @var $response JsonResponse */
            return $response->setData($data);
        }
        $content = json_encode($data, JsonResponse::DEFAULT_ENCODING_OPTIONS);
        return $response->setContent($content);
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