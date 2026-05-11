<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'description', 'color'];

    protected static function boot()
    {
        parent::boot();
        static::creating(fn($m) => $m->slug = $m->slug ?: Str::slug($m->name));
    }

    public function articles() { return $this->hasMany(Article::class); }
    public function judgments() { return $this->hasMany(Judgment::class); }
    public function latestNews() { return $this->hasMany(LatestNews::class); }
}
