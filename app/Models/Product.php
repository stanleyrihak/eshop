<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Money\Money;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'name',
        'price',
    ];

//    protected $casts = [
//        'price' => 'money:2', // 2 decimal places
//    ];
}
