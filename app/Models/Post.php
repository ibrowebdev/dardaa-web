<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'thumbnail',
        'category',
        'author',
        'published_at',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getReadTimeAttribute(): int
    {
        return max(1, (int) ceil(str_word_count(strip_tags($this->body)) / 200));
    }

    public function relatedPosts(int $limit = 3)
    {
        return static::where('category', $this->category)
            ->where('id', '!=', $this->id)
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->limit($limit)
            ->get();
    }
}
