<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image',
        'content',
        'is_published',
        'published_at',
    ];

    protected static function booted()
    {
        static::creating(function ($post) {
            $post->slug = Str::slug($post->title);

            // If slug already exists, append number
            $originalSlug = $post->slug;
            $count = 1;

            while (Post::where('slug', $post->slug)->exists()) {
                $post->slug = "{$originalSlug}-{$count}";
                $count++;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
