<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_prices extends Model
{
    use HasFactory;

    public function insertPrice($origin, $product_id) {
        $db = new product_prices;
        $db->product_id = $product_id;
        $db->price_origin = $origin;
        $db->save();

        return $db;
    }

    public function updatePrice($request, $id) {
        $db = product_prices::find($id);
        $db->price_origin = $request['price_origin'];
        $db->save();
        return $db;
    }

    public function destroyPrice($id) {
        $db = product_prices::findOrFail($id);
        $db->is_active = 0;
        $db->save();
        return "Success deleted";
    }
}
