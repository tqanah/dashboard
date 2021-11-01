<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        
        return  [
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'description'=>$this->resource->description,
            'published_at'=>$this->resource->created_at->diffForHumans(),

        ];
    }
}
