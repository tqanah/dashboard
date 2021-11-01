<?php

namespace App\Models\Dashboard;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Blog extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'body',
        'hasMedia',
        'created_by',
        'updated_by',
        'viewed',
        'image'
    ];

    public function blogs_creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'blogs_categories');
    }

    public function editor()
    {
        return $this->belongTo(User::class, 'updated_by');
    }

    public function getAuthorAttribute()
    {
        return $this->blogs_creator;
    }
   
}
