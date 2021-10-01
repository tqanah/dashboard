<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
           'id'=>$this->id,
           'title'=>$this->title,
           'body'=>$this->body,
           'published_at'=>$this->created_at->diffForHumans(),
           'created_at'=>$this->created_at,
           'author'=>$this->Author->name,
           'image'=>$this->image,
           'category'=>new CategoryResource($this->Categories)

       ];
    }
}
