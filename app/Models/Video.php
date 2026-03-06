<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Video extends Model
{
    protected $fillable = [
        'title', 'description', 'video_url', 'category_id', 'views',
    'likes', 'comments',
   
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function getEmbedUrlAttribute()
{
    if (str_contains($this->video_url, 'youtu.be')) {
        return str_replace('youtu.be/', 'www.youtube.com/embed/', $this->video_url);
    }

    if (str_contains($this->video_url, 'watch?v=')) {
        return str_replace('watch?v=', 'embed/', $this->video_url);
    }

    return $this->video_url;
}

}

