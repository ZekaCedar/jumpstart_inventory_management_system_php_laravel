<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_id',
        'product_id',
        'supplier_id',
        'sales_item_name',
        'sales_item_price',
        'sales_item_quantity',
    ];
}