<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carts extends Model
{
    use HasFactory;

    public function customer() {
        return $this->belongsTo(customers::class, 'customer_id')->where('is_active', 1);
    }

    public function details() {
        return $this->hasMany(cart_details::class, 'cart_id')->where('is_active', 1);
    }
}
