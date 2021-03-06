<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\product_colors;
use App\Models\product_sizes;
use Illuminate\Http\Request;

class product_sizesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = product_colors::where('is_active', 1)->get();
        $sizes = product_sizes::where('is_active', 1)->with('color')->orderBy('product_color_id')->get();
        return ['sizes' => $sizes, 'colors' => $colors];
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
        $size = new product_sizes();
        $size->product_color_id = $request->product_color_id;
        $size->size = $request->size;
        $size->quantity = $request->quantity;
        $size->save();

        return $this->show($size->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product_size  $product_size
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = product_sizes::where('is_active', 1)->with('color')->find($id);
        return $db;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product_size  $product_size
     * @return \Illuminate\Http\Response
     */
    public function edit(product_sizes $product_sizes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product_size  $product_size
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $size = product_sizes::find($id);
        $size->product_color_id = $request->product_color_id;
        $size->size = $request->size;
        $size->quantity = $request->quantity;
        $size->save();

        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_size  $product_size
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = product_sizes::findOrFail($id);
        $db->is_active = 0;
        $db->save();
        return "Deleted";
    }
}
