<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Article extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id', 'author_id', 'title', 'slug', 'excerpt', 'content',
        'image', 'status', 'is_featured', 'published_at',
        'meta_title', 'meta_description', 'og_image', 'views',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($m) {
            $m->slug = $m->slug ?: static::uniqueSlug($m->title);
        });
    }

    public static function uniqueSlug(string $title): string
    {
        $slug = Str::slug($title);
        $count = static::where('slug', 'LIKE', "{$slug}%")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }

    public function category() { return $this->belongsTo(Category::class); }
    public function author() { return $this->belongsTo(Author::class); }
    public function tags() { return $this->belongsToMany(Tag::class); }

    public function getReadingTimeAttribute(): string
    {
        $minutes = (int) ceil(str_word_count(strip_tags($this->content ?? '')) / 200);
        return max(1, $minutes) . ' min read';
    }

    public function scopePublished($q) { return $q->where('status', 'published'); }
    public function scopeFeatured($q) { return $q->where('is_featured', true); }
}
