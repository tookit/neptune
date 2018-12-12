<?php

namespace App\Http\Resources;

use App\Models\User;

class UserResource extends Resource
{
    public static function collection($resource)
    {
        return parent::collection($resource);
    }

    public function toArray($request)
    {

        return parent::toArray($request);
    }
}
