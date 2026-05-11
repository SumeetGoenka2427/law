<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SidebarContent extends Model
{
    protected $fillable = ['widget_key', 'title', 'content', 'is_active', 'sort_order'];

    protected $casts = ['is_active' => 'boolean'];
}
