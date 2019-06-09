<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends  JsonResource
{


    public function __construct(mixed $resource)
    {
        parent::__construct($resource);
    }

}