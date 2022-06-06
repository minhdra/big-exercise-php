<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\order_details;
use App\Models\orders;
use App\Models\products;
use Illuminate\Http\Request;

class order_detailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::where('is_active', 1)->get();
        $orders = orders::where('is_active', 1)->get();
        $details = order_details::where('is_active', 1)->get();
        foreach ($details as $detail) {
            $detail->product;
            $order = $detail->order;
            $customer = $order->customer;
            $customer->info;
        }

        return ['details' => $details, 'products' => $products, 'orders' => $orders];
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
        $db = new order_details();
        $db->order_id = $request->order_id;
        $db->product_id = $request->product_id;
        $db->quantity = $request->quantity;
        $db->single_price = $request->single_price;
        $db->image = $request->image;
        $db->color = $request->color;
        $db->size = $request->size;
        $db->save();

        $total = $this->calculateTotal($db->order_id);
        (new orders())->updateTotal($db->order_id, $total);

        return $this->show($db->id);
    }

    private function calculateTotal($order_id)
    {
        $total = 0;
        $details = order_details::where('is_active', 1)->where('order_id', $order_id)->get();
        foreach ($details as $detail) {
            $total += $detail->quantity * $detail->single_price;
        }

        return $total;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order_details  $order_details
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = order_details::where('is_active', 1)->find($id);
        $db->product;
        $order = $db->order;
        $customer = $order->customer;
        $customer->info;
        return $db;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order_details  $order_details
     * @return \Illuminate\Http\Response
     */
    public function edit(order_details $order_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order_details  $order_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = order_details::where('is_active', 1)->find($id);
        $db->order_id = $request->order_id;
        $db->product_id = $request->product_id;
        $db->quantity = $request->quantity;
        $db->single_price = $request->single_price;
        $db->image = $request->image;
        $db->color = $request->color;
        $db->size = $request->size;
        $db->save();

        $total = $this->calculateTotal($db->order_id);
        (new orders())->updateTotal($db->order_id, $total);

        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order_details  $order_details
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = order_details::findOrFail($id);
        $db->is_active = 0;
        $db->save();

        return "Deleted";
    }
}
