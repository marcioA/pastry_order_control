<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $table = 'store_orders';
    protected $fillable = [
        'customer_id',
        'product_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'products->id');
    }
}
