<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'email',
        'phone',
        'order_id',
        'gross_amount',
        'payment_type',
        'snap_token',
    ];
}
