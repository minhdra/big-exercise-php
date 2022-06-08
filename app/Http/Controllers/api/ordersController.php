<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\customer_infos;
use App\Models\customers;
use App\Models\order_details;
use App\Models\order_statuses;
use App\Models\orders;
use Illuminate\Http\Request;

class ordersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = customer_infos::where('is_active', 1)->get();
        $orders = orders::where('is_active', 1)->get();
        $statuses = order_statuses::where('is_active', 1)->get();
        foreach ($orders as $order) {
            $c = $order->customer;
            $c->info;
            $details = $order->details;
            foreach ($details as $detail) {
                $detail->product;
            }
            $order->status;
        }
        return ['orders'=>$orders, 'customers'=>$customers, 'statuses'=>$statuses];
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
        $db = new orders();
        $db->customer_id = $request->customer_id;
        $db->delivery_address = $request->delivery_address;
        $db->total = $request->total;
        $db->status_id = 1;
        $db->save();
        $details = $request->details;
        if($details) {
            $detail = new order_details();
            foreach($details as $item) {
                $detail->insertDetail($item, $db->id);
            }
        }

        return $this->show($db->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = orders::where('is_active', 1)->find($id);
        if($order) {
            $c = $order->customer;
            $c->info;
            $details = $order->details;
            foreach ($details as $detail) {
                $detail->product;
            }
            $order->status;
        }
        return $order;
    }

    public function trackingOrder(Request $request)
    {
        $order = orders::where('is_active', 1)->where('customer_id', $request->customer_id)->find($request->id);
        if($order) {
            $c = $order->customer;
            $c->info;
            $details = $order->details;
            foreach ($details as $detail) {
                $detail->product;
            }
            $order->status;
        }
        return $order;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = orders::where('is_active', 1)->find($id);
        $db->delivery_address = $request->delivery_address;
        
        $db->total = $request->total;
        $db->status_id = $request->status_id;
        $db->save();

        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = orders::findOrFail($id);
        $db->is_active = 0;
        $db->save();

        $details = order_details::where('order_id', $id)->get();
        if($details) {
            foreach($details as $item) {
                $item->is_active = 0;
                $item->save();
            }
        }

        return "Deleted";
    }
}
