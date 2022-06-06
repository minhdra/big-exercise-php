<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    use HasFactory;

    public function info() {
        return $this->hasOne(customer_infos::class, 'customer_id')->where('is_active', 1);
    }

    public function delivery_addresses() {
        return $this->hasMany(delivery_addresses::class, 'customer_id')->where('is_active', 1)->orderBy('status', 'DESC');
    }

    public function cart() {
        $cart= $this->hasOne(carts::class, 'customer_id')->where('is_active', 1);
        return $cart;
    }

    public function cart_details() {
        return $this->hasManyThrough(cart_details::class, carts::class, 'customer_id', 'cart_id')->where('cart_details.is_active', 1);
    }

    public function orders() {
        return $this->hasMany(orders::class, 'customer_id')->where('is_active', 1);
    }
}
