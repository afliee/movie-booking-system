<?php

namespace App\Models;

use Libraries\database_drivers\Model;

class Tickets extends Model
{
    public string $table = 'tickets';

    public array $fillable = [
        'price_per_ticket','premiered_at', 'seat_id', 'movie_id'
    ];
}