<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Author extends Model
{
    protected $fillable = ['name', 'slug', 'designation', 'bio', 'image', 'email', 'twitter', 'linkedin', 'is_active'];

    protected static function boot()
    {
        parent::boot();
        static::creating(fn($m) => $m->slug = $m->slug ?: Str::slug($m->name));
    }

    public function articles() { return $this->hasMany(Article::class); }
    public function interviews() { return $this->hasMany(Interview::class); }
    public function opinions() { return $this->hasMany(Opinion::class); }
    public function latestNews() { return $this->hasMany(LatestNews::class); }
}
