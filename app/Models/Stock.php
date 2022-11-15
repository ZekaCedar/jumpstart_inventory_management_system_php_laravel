<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'user_id',
        'stock_product',
        'stock_image',
        'stock_item_type',
        'stock_item_category',
        'stock_item_brand',
        'stock_item_barcode',
        'stock_location',
        'selling_price',
        'purchase_price',
        'stock_quantity',
        'stock_status',
        'stock_message',
        'safety_stock',
        'reorder_point',
        'economic_order_quantity',
    ];
}