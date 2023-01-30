<?php

namespace App\Models;

use Libraries\database_drivers\Model;

class ComboFood extends Model {
    public string $table = 'combo_food';

    public array $fillable = [
        'combo_id', 'food_id'
    ];
}