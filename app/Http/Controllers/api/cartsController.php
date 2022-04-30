<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\cart_details;
use App\Models\carts;
use Illuminate\Http\Request;

class cartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return carts::where('is_active', 1)->get();
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
        $db = new carts();
        $db->customer_id = $request->customer_id;
        $db->save();

        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = carts::where('is_active', 1)->find($id);
        return $db;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function edit(carts $carts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = carts::where('is_active', 1)->find($id);
        $db->customer_id = $request->customer_id;
        $db->save();

        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = carts::findOrFail($id);
        $db->is_active = 0;
        $db->save();

        $info = cart_details::where('cart_id', $db->id)->first();
        if($info) {
            $info->is_active = 0;
            $info->save();
        }

        return "Deleted";
    }
}
