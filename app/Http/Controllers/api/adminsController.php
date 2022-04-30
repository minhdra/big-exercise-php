<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\admin_infos;
use App\Models\admins;
use Illuminate\Http\Request;

class adminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return admins::where('is_active', 1)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $db = new admins();
        $db->username = $request->username;
        $db->password = $request->password;
        $db->role = $request->role;
        $db->status = $request->status;
        $db->save();

        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = admins::where('is_active', 1)->find($id);
        return $db;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit(admins $admins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = admins::where('is_active', 1)->find($id);
        $db->username = $request->username;
        $db->password = $request->password;
        $db->role = $request->role;
        $db->status = $request->status;
        $db->save();

        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = admins::findOrFail($id);
        $db->is_active = 0;
        $db->save();

        $info = admin_infos::where('admin_id', $db->id)->first();
        if($info) {
            $info->is_active = 0;
            $info->save();
        }

        return "Deleted";
    }
}
