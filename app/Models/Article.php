<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title', 'slug', 'content',
        'status', 'published_at', 'featured_image',
        'meta_title', 'meta_description', 'meta_keywords',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

}
