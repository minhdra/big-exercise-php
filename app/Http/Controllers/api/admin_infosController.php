<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\admin_infos;
use Illuminate\Http\Request;

class admin_infosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return admin_infos::where('is_active', 1)->get();
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
        $db = new admin_infos();
        $db->admin_id = $request->admin_id;
        $db->full_name = $request->full_name;
        $db->avatar = $request->avatar;
        $db->phone_number = $request->phone_number;
        $db->address = $request->address;
        $db->email = $request->email;
        $db->identity_card = $request->identity_card;
        $db->save();

        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin_infos  $admin_infos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = admin_infos::where('is_active', 1)->find($id);
        return $db;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin_infos  $admin_infos
     * @return \Illuminate\Http\Response
     */
    public function edit(admin_infos $admin_infos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin_infos  $admin_infos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = admin_infos::where('is_active', 1)->find($id);
        $db->full_name = $request->full_name;
        $db->avatar = $request->avatar;
        $db->phone_number = $request->phone_number;
        $db->address = $request->address;
        $db->email = $request->email;
        $db->identity_card = $request->identity_card;
        $db->save();

        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin_infos  $admin_infos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = admin_infos::findOrFail($id);
        $db->is_active = 0;
        $db->save();

        return "Deleted";
    }
}
