<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\discounts;
use Illuminate\Http\Request;

class discountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return discounts::where('is_active', 1)->get();
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
        $db = new discounts();
        $db->name = $request->name;
        $db->description = $request->description;
        $db->discount_percent = $request->discount_percent;
        $db->active = 1;
        $db->save();

        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = discounts::where('is_active', 1)->find($id);
        return $db;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function edit(discounts $discounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = discounts::where('is_active', 1)->find($id);
        $db->name = $request->name;
        $db->description = $request->description;
        $db->discount_percent = $request->discount_percent;
        $db->active = $request->active;
        $db->save();

        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\discounts  $discounts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = discounts::findOrFail($id);
        $db->is_active = 0;
        $db->save();

        return "Deleted";
    }
}
