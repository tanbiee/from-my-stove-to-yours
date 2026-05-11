<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Blog extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'blogs';

    protected $fillable = [
        'title',
        'category',
        'tags',
        'content',
        'cover_image_url',
        'is_featured',
        'read_time_min',
        'likes',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'likes'       => 'integer',
        'tags'        => 'array',
    ];
}
