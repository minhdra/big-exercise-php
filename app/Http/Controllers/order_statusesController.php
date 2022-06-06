<?php

namespace App\Http\Controllers;

use App\Models\order_statuses;
use Illuminate\Http\Request;

class order_statusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = order_statuses::where('is_active', 1)->get();
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
        $db = new order_statuses();
        $db->status_name = $request->status_name;
        $db->save();

        return $this->show($db->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product_db  $product_db
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = order_statuses::where('is_active', 1)->find($id);
        return $db;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product_db  $product_db
     * @return \Illuminate\Http\Response
     */
    public function edit(order_statuses $order_statuses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product_db  $product_db
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = order_statuses::find($id);
        $db->status_name = $request->status_name;
        $db->save();

        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_db  $product_db
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = order_statuses::findOrFail($id);
        $db->is_active = 0;
        $db->save();
        return "Deleted";
    }
}
