<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        if (config('app.env') === 'local')
            $url = 'https://www.tqanah.com/';
        else
            $url = 'http://127.0.0.1:8000/';

        return [
            'id' => $this->id,
            'title' => $this->title,
            'published_at' => $this->created_at->diffForHumans(),
            'created_at' => $this->created_at,
            'author' => $this->Author->name,
            'image' => $this->getFirstMediaUrl(),
            'category' => new CategoryResource($this->Categories),
            'link' => $url.'api/dashboard/blog/show/' . $this->id
        ];
    }
}
