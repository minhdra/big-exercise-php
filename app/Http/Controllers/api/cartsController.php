<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\cart_details;
use App\Models\carts;
use App\Models\customers;
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
        $customers = customers::with('info')->where('is_active', 1)->get();
        $carts = carts::where('is_active', 1)->get();
        foreach ($carts as $cart) {
            $customer = $cart->customer;
            $customer->info;
            $details = $cart->details;
            foreach ($details as $detail) {
                $detail->product;
            }
        }
        return ['carts'=>$carts, 'customers'=>$customers];
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
        $detail = new cart_details();
        $check = carts::where('customer_id', $request->customer_id)->first();
        if ($check) {
            $item = $request->detail ?? null;
            if ($item) {
                $details = $this->show($check->id)->details;
                $c = false;
                $thisDetail = '';
                foreach ($details as $d) {
                    if ($d['product_id'] == $item['product_id'] && $d['color'] == $item['color']['color']) {
                        $thisDetail = $d;
                        $c = true;
                        break;
                    }
                }
                if ($c) {
                    $item['quantity'] = $thisDetail['quantity'] + $item['quantity'];
                    $detail->updateCartDetails($item, $thisDetail['id']);
                } else {
                    $detail->insertCartDetails($item, $check->id);
                }
            }
        } else {
            $db = new carts();
            $db->customer_id = $request->customer_id;
            $db->save();

            $item = $request->detail ?? null;
            if ($item) {
                $detail->insertCartDetails($item, $db->id);
            }
        }

        return "Success";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cart = carts::where('is_active', 1)->find($id);
        $customer = $cart->customer;
        $customer->info;
        $details = $cart->details;
        foreach ($details as $detail) {
            $detail->product;
        }
        // $db = carts::with('customer')->with('details')->where('is_active', 1)->find($id);
        return $cart;
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

        $details = cart_details::where('cart_id', $db->id)->get();
        foreach ($details as $detail) {
            $detail->is_active = 0;
            $detail->save();
        }

        return "Deleted";
    }
}
