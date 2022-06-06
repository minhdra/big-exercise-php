<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin_infos extends Model
{
    use HasFactory;

    public function insertInfo($request, $admin_id)
    {
        $db = new admin_infos();
        $db->admin_id = $admin_id;
        $db->full_name = $request['full_name'];
        $db->avatar = $request['avatar'] ?? null;
        $db->phone_number = $request['phone_number'];
        $db->address = $request['address'];
        $db->email = $request['email'];
        $db->identity_card = $request['identity_card'];
        $db->save();

        return $db;
    }

    public function updateInfo($request, $id) {
        $db = admin_infos::where('is_active', 1)->find($id);
        $db->full_name = $request['full_name'];
        $db->avatar = $request['avatar'] ?? null;
        $db->phone_number = $request['phone_number'];
        $db->address = $request['address'];
        $db->email = $request['email'];
        $db->identity_card = $request['identity_card'];
        $db->save();

        return $db;
    }
}
