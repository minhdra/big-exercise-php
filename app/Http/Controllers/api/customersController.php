<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\customer_infos;
use App\Models\customers;
use App\Models\delivery_addresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class customersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $db = customers::where('is_active', 1)->get();
        foreach ($db as $customer) {
            $customer->cart;
            $cart_details = $customer->cart_details;
            foreach ($cart_details as $cart_detail) {
                $cart_detail->product;
            }
            $orders = $customer->orders;
            foreach ($orders as $order) {
                $order_details = $order->details;
                $order->status;
                foreach ($order_details as $order_detail) {
                    $o = $order_detail->product;
                    $o->category;
                    $o->brand;
                    $o->supplier;
                    $o->price;
                    $colors = $o->colors;
                    foreach ($colors as $color) {
                        $color->sizes;
                        $color->images;
                    }
                }
            }
            $customer->info;
            $customer->delivery_addresses;
        }
        return $db;
        // return customers::with(['cart', 'cart_details', 'info', 'delivery_addresses'])->where('is_active', 1)->get();
    }

    public function login(Request $request)
    {
        $db = customers::where('username', $request->username)->where('password', $request->password)->where('is_active', 1)->selectRaw('id, username')->first();
        return $db;
    }

    public function register(Request $request)
    {
        $check = customers::where('username', $request->username)->first();
        if (!$check) {
            $db = new customers();
            $db->username = $request->username;
            $db->password = $request->password;
            $db->status = 1;
            $db->save();
            $check = "true";
        } else {
            $check = "false";
        }
        return $check;
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
        $db->status = 1;
        $db->save();

        $info = $request->info;
        if ($info) {
            (new customer_infos())->insertInfo($info, $db->id);
        }
        return $this->show($db->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = customers::where('is_active', 1)->where('id', $id)->first();
        $db->cart;
        $cart_details = $db->cart_details;
        foreach ($cart_details as $cart_detail) {
            $cart_detail->product;
        }
        $orders = $db->orders;
        foreach ($orders as $order) {
            $order_details = $order->details;
            $order->status;
            foreach ($order_details as $order_detail) {
                $o = $order_detail->product;
                $o->category;
                $o->brand;
                $o->supplier;
                $o->price;
                $colors = $o->colors;
                foreach ($colors as $color) {
                    $color->sizes;
                    $color->images;
                }
            }
        }
        $db->info;
        $db->delivery_addresses;
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
        $i = $request->info;
        $info = new customer_infos();
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
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = customers::findOrFail($id);
        $db->is_active = 0;
        $db->save();

        $info = customer_infos::where('is_active', 1)->where('customer_id', $db->id)->first();
        if ($info) {
            $info->is_active = 0;
            $info->save();
        }

        $address = delivery_addresses::where('is_active', 1)->where('customer_id', $db->id)->first();
        if ($address) {
            $address->is_active = 0;
            $address->save();
        }

        return "Deleted";
    }
}
