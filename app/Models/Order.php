<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'first-name',
        'last-name',
        'company-name',
        'address',
        'accommodation',
        'city',
        'email',
        'phone',
        'order-notes',
        'coupon',
        'postal-or-zip',
    ];
}
