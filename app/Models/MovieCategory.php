<?php

namespace App\Models;

use Libraries\database_drivers\Model;

class MovieCategory extends Model
{
    public string $table = 'movie_category';

    public array $fillable = [
        'movie_id', 'category_id', 'type'
    ];
}