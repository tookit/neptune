<?php

namespace App\Http\Resources;

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
        return [
            'id' =>$this->resource->id,
            'name' => $this->resource->name,
            'description' => $this->resource->description,
            'featured_img' => $this->resource->featured_img,
            'category_path' => $this->buildCategoryPath($this->resource->categories),
            'created_at' => $this->resource->created_at 

        ];
    }



    protected function buildCategoryPath(\Illuminate\Support\Collection $cats)
    {
        return $cats->pluck('name')->implode(',');
    }
}
