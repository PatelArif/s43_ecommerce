<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id','order_id', 'shipping_address', 'subtotal', 'donation',
        'total', 'payment_method', 'payment_slip', 'status'
    ];

public function user() {
    return $this->belongsTo(User::class);
}

public function donation()
{
    return $this->hasOne(\App\Models\Donation::class);
}
public function donations()
{
    return $this->hasMany(Donation::class);
}

public function items()
{
    return $this->hasMany(\App\Models\OrderItem::class);
}



 
}
