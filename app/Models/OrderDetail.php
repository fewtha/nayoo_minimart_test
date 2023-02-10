<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'product_name',
        'amount',
        'price',
    ];

    function order()
    {
        return $this->belongsTo(Order::class);
    }
}
