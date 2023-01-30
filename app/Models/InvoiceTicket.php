<?php

namespace App\Models;

use Libraries\database_drivers\Model;

class InvoiceTicket extends Model
{
    public string $table = 'invoice_ticket';

    public array $fillable = [
        'invoice_id', 'ticket_id'
    ];
}