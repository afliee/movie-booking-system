<?php

namespace App\Models;

use Libraries\database_drivers\Model;

class Users extends Model
{
    public string $table = 'users';
    protected array $fillable = [
        'name', 'email_address', 'password', 'phone', 'gender','registered_at', '_token', 'role'
    ];

    protected array $not_string_attributes = [
        'role'
    ];

}