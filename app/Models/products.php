<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
use HasFactory;
    public function Categories() {
        return $this->belongsTo(categories::class, 'category_id', 'id')->where('is_active', 1);
    }
    public function Brands() {
        return $this->belongsTo(brands::class, 'brand_id', 'id')->where('is_active', 1);
    }
    public function supplier() {
        return $this->belongsTo(suppliers::class, 'supplier_id', 'id')->where('is_active', 1);
    }
    public function Colors() {
        return $this->hasMany(product_colors::class, 'product_id', 'id')->where('is_active', 1);
    }
    public function Price() {
        return $this->hasOne(product_prices::class, 'product_id', 'id')->where('is_active', 1);
    }
    public function Images() {
        return $this->hasManyThrough(product_images::class, product_colors::class, 'product_id', 'product_color_id', 'id', 'id')->where('product_images.is_active', 1);
    }
    public function Sizes() {
        return $this->hasManyThrough(product_sizes::class, product_colors::class, 'product_id', 'product_color_id', 'id', 'id')->where('product_sizes.is_active', 1);
    }
}
