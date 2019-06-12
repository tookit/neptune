<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $item = $this->resource;
        $item->url = $item->getUrl();
        return $this->resource->toArray();
    }


    public function additional(array $data)
    {
        return parent::additional($data);
    }

}
