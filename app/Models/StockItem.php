<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_id',
        'user_id',
        'product_id',
        'stock_item_name',
        'stock_image',
        'stock_item_type',
        'stock_item_category',
        'stock_item_brand',
        'stock_item_price',
        'stock_item_barcode',
    ];
}