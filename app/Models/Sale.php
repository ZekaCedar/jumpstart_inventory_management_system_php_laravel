<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'manager_id',
        'customer_id',
        'sales_total',
        'sales_product_quantity',
        'sales_location',
        'sales_manager',
    ];
}