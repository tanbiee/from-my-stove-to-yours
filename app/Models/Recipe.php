<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Recipe extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'title',
        'description',
        'ingredients',
        'process',
        'origin',
        'rating',
        'image'
    ];
}