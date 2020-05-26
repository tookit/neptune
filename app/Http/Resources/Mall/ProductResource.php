<?php

namespace App\Http\Resources\Mall;

use Illuminate\Http\Resources\Json\JsonResource;
use Nexmo\Call\Collection;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return parent::toArray($request);
    }



    protected function buildCategoryPath(\Illuminate\Support\Collection $cats)
    {
        return $cats->pluck('name')->implode(',');
    }
}
