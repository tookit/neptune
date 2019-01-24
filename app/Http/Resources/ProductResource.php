<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        return [
            'id' =>$this->resource->id,
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'featured_img' => $this->resource->featured_img,
            'categories' => $this->resource->categories,

        ];
    }
}
