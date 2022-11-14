<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_name',
        'order_location',
        'order_status',
        'order_quantity',
        'order_total',
        'tracking_no',
        'order_message',
    ];
}