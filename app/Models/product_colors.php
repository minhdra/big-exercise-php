<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_colors extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->hasOne(products::class, 'id', 'product_id')->where('is_active', 1);
    }
    public function images()
    {
        return $this->hasMany(product_images::class, 'product_color_id', 'id')->where('is_active', 1);
    }
    public function sizes()
    {
        return $this->hasMany(product_sizes::class, 'product_color_id', 'id')->where('is_active', 1);
    }

    public function insertColor($request, $product_id) {
        $color = new product_colors();
        $color->product_id = $product_id;
        $color->color = $request['color'];
        // $color->hex = $request['hex'] == null ? $request['hex'] : null;
        $color->save();

        return $color;
    }

    public function updateColor($request, $id) {
        $color = product_colors::where('is_active', 1)->find($id);
        $color->color = $request['color'];
        $color->hex = $request['hex'] ?? null;
        $color->save();
        return $color;
    }

    public function destroyColor($id) {
        $color = product_colors::findOrFail($id);
        $color->is_active = 0;
        $color->save();
        return "Success deleted";
    }
}
