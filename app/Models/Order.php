<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'company_name',
        'address',
        'accommodation',
        'city',
        'email',
        'phone',
        'order_notes',
        'coupon',
        'postal_or_zip',
        'order',
        'total'
    ];
}
