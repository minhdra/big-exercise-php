<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\delivery_addresses;
use Illuminate\Http\Request;

class delivery_addressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return delivery_addresses::where('is_active', 1)->get();
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
        $db = new delivery_addresses();
        $db->customer_id = $request->customer_id;
        $db->province = $request->province;
        $db->district = $request->district;
        $db->commune = $request->commune;
        $db->specific_address = $request->specific_address;
        $db->type_address = $request->type_address;
        $db->status = $request->status;
        $db->phone_number = $request->phone_number;
        $db->save();

        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\delivery_addresses  $delivery_addresses
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = delivery_addresses::where('is_active', 1)->find($id);
        return $db;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\delivery_addresses  $delivery_addresses
     * @return \Illuminate\Http\Response
     */
    public function edit(delivery_addresses $delivery_addresses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\delivery_addresses  $delivery_addresses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = delivery_addresses::where('is_active', 1)->find($id);
        $db->province = $request->province;
        $db->district = $request->district;
        $db->commune = $request->commune;
        $db->specific_address = $request->specific_address;
        $db->type_address = $request->type_address;
        $db->status = $request->status;
        $db->phone_number = $request->phone_number;
        $db->save();

        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\delivery_addresses  $delivery_addresses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = delivery_addresses::findOrFail($id);
        $db->is_active = 0;
        $db->save();

        return "Deleted";
    }
}
