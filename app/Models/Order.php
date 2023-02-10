<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $fillable = [
        'id',
        'user_id',
        'status',
        'total',
    ];

    function totalOrders(){
        $order_details=$this->order_details;
        $sumAmount=0;
        foreach($order_details as $order_detail){
            $sumAmount += $order_detail->amount;
        }
        return $sumAmount;
    }

    function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }
}

