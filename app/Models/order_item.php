<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    protected $fillable = ['user_id', 'product_id', 'order_id', 'quantity', 'price',];
    public function order()
    {
        return $this->belongsTo(order::class, 'order_id');
    }
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
