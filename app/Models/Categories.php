<?php

namespace App\Models;

use Libraries\database_drivers\Model;

class Categories extends Model
{
    public string $table ='categories';
    public array $fillable = [
        'type'
    ];
}