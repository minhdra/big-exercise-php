<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\suppliers;
use Illuminate\Http\Request;

class suppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return suppliers::where('is_active', 1)->get();
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
        $db = new suppliers();
        $db->name = $request->name;
        $db->address = $request->address;
        $db->email = $request->email;
        $db->phone_number = $request->phone_number;
        $db->save();

        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = suppliers::where('is_active', 1)->find($id);
        return $db;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function edit(suppliers $suppliers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = suppliers::where('is_active', 1)->find($id);
        $db->name = $request->name;
        $db->address = $request->address;
        $db->email = $request->email;
        $db->phone_number = $request->phone_number;
        $db->save();

        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = suppliers::findOrFail($id);
        $db->is_active = 0;
        $db->save();

        return "Deleted";
    }
}
