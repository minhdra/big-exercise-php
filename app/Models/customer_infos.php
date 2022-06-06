<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_infos extends Model
{
    use HasFactory;

    public function insertInfo($request, $customer_id)
    {
        $db = new customer_infos();
        $db->customer_id = $customer_id;
        $db->full_name = $request['full_name'];
        $db->avatar = $request['avatar'] ?? null;
        $db->phone_number = $request['phone_number'];
        $db->address = $request['address'];
        $db->email = $request['email'];
        $db->save();

        return $db;
    }

    public function updateInfo($request, $id) {
        $db = customer_infos::where('is_active', 1)->find($id);
        $db->full_name = $request['full_name'];
        $db->avatar = $request['avatar'] ?? null;
        $db->phone_number = $request['phone_number'];
        $db->address = $request['address'];
        $db->email = $request['email'];
        $db->save();

        return $db;
    }
}
