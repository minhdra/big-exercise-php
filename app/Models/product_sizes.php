<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_sizes extends Model
{
    use HasFactory;

    public function color() {
        return $this->belongsTo(product_colors::class, 'product_color_id')->where('is_active', 1);
    }

    public function insertSize($request, $product_color_id) {
        $db = new product_sizes();
        $db->product_color_id = $product_color_id;
        $db->size = $request['size'];
        $db->quantity = $request['quantity'];
        $db->save();

        return $db;
    }

    public function updateSize($request, $id) {
        $db = product_sizes::where('is_active', 1)->find($id);
        $db->size = $request['size'];
        $db->quantity = $request['quantity'];
        $db->save();
        return $db;
    }

    public function destroySize($id) {
        $db = product_sizes::findOrFail($id);
        $db->is_active = 0;
        $db->save();
        return "Success deleted";
    }
}
