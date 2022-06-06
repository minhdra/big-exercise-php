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
        return admins::with('info')->where('is_active', 1)->get();
    }

    public function login(Request $request)
    {
        $db = admins::where('username', $request->username)->where('password', $request->password)->where('is_active', 1)->selectRaw('id')->first();
        // session('customer', $db);
        return $db;
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

        $info = $request->info;
        if ($info) {
            (new admin_infos())->insertInfo($info, $db->id);
        }
        return $this->show($db->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = admins::with('info')->where('is_active', 1)->find($id);
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
        $i = $request->info;
        $info = new admin_infos();
        if ($i) {
            $idInfo = $i['id'] ?? null;
            if ($idInfo)
                $info->updateInfo($i, $idInfo);
            else
                $info->insertInfo($i, $db->id);
        }

        return $this->show($id);
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

        $info = admin_infos::where('is_active', 1)->where('admin_id', $db->id)->first();
        if ($info) {
            $info->is_active = 0;
            $info->save();
        }

        return "Deleted";
    }
}
