<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\customer_infos;
use App\Models\customers;
use App\Models\delivery_addresses;
use Illuminate\Http\Request;

class customersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return customers::where('is_active', 1)->get();
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
        $db = new customers();
        $db->username = $request->username;
        $db->password = $request->password;
        $db->status = $request->status;
        $db->save();

        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = customers::where('is_active', 1)->find($id);
        return $db;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(customers $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = customers::where('is_active', 1)->find($id);
        $db->username = $request->username;
        $db->password = $request->password;
        $db->status = $request->status;
        $db->save();

        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = customers::findOrFail($id);
        $db->is_active = 0;
        $db->save();

        $info = customer_infos::where('customer_id', $db->id)->first();
        if($info) {
            $info->is_active = 0;
            $info->save();
        }

        $address = delivery_addresses::where('customer_id', $db->id)->first();
        if($address) {
            $address->is_active = 0;
            $address->save();
        }

        return "Deleted";
    }
}
