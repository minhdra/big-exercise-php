<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_images extends Model
{
    use HasFactory;

    public function color() {
        return $this->hasOne(product_colors::class, 'id', 'product_color_id')->where('is_active', 1);
    }

    public function insertImage($request, $product_color_id) {
        $db = new product_images();
        $db->image = $request['image'];
        $db->product_color_id = $product_color_id;
        $db->save();

        return $db;
    }

    public function updateImage($request, $id) {
        $db = product_images::find($id);
        $db->image = $request['image'];
        $db->save();
        return $db;
    }

    public function destroyImage($id) {
        $db = product_images::findOrFail($id);
        $db->is_active = 0;
        $db->save();
        return "Success deleted";
    }
}
