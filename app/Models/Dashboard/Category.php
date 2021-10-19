<?php

namespace App\Models\Dashboard;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blogs_categories');
    }
}
