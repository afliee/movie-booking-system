<?php

namespace App\Models;

use Libraries\database_drivers\Model;

class Seat extends Model
{
    public string $table = 'seat';

    public array $fillable = [
        'location','type','room_id'
    ];
}