<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'supplier_id',
        'manager_id',
        'product_name',
        'product_supplier',
        'product_category',
        'product_type',
        'product_image',
        'product_price',
    ];

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'id');
    }

    public function employees()
    {
        return $this->belongsTo(Employee::class, 'manager_id', 'id');
    }
}