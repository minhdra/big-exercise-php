<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart_details extends Model
{
    use HasFactory;

    public function insertCartDetails($request, $cart_id) {
        $db = new cart_details();
        $db->cart_id = $cart_id;
        $db->product_id = $request['product_id'];
        $db->quantity = $request['quantity'];
        $db->single_price = $request['single_price'];
        $db->status = $request['status'];
        $db->size = $request['size']['size'];
        $db->color = $request['color']['color'];
        $db->image = $request['image']['image'];
        $db->save();

        return $db;
    }

    public function updateCartDetails($request, $id) {
        $db = cart_details::where('is_active', 1)->find($id);
        // $db->product_id = $request['product_id'];
        $db->quantity = $request['quantity'];
        // $db->single_price = $request['single_price'];
        $db->status = $request['status'];
        $db->size = $request['size']['size'];
        // $db->color = $request['color']['color'];
        // $db->image = $request['image']['image'];
        $db->save();
        return $db;
    }

    public function destroyCartDetails($id) {
        $db = cart_details::findOrFail($id);
        $db->is_active = 0;
        $db->save();
        return "Success deleted";
    }
}
