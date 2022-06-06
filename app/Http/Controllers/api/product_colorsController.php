<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\product_colors;
use App\Models\product_images;
use App\Models\product_sizes;
use App\Models\products;
use Illuminate\Http\Request;

class product_colorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = product_colors::where('is_active', 1)->with('product')->orderBy('product_id')->get();
        $products = products::where('is_active', 1)->get();
        return ['colors'=>$colors, 'products'=>$products];
    }

    public function getProducts()
    {
        return products::where('is_active', 1)->get();
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
        $color = new product_colors();
        $color->color = $request->color;
        $color->product_id = $request->product_id;
        $color->hex = $request->hex;
        $color->save();

        return $this->show($color->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product_colors  $product_colors
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $color = product_colors::where('is_active', 1)->with('product')->find($id);
        return $color;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product_colors  $product_colors
     * @return \Illuminate\Http\Response
     */
    public function edit(product_colors $product_colors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product_colors  $product_colors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $color = product_colors::find($id);
        $color->product_id = $request->product_id;
        $color->color = $request->color;
        $color->hex = $request->hex;
        $color->save();
        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_colors  $product_colors
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // building
        $color = product_colors::findOrFail($id);
        $color->is_active = 0;
        $color->save();

        $images = product_images::where('product_color_id', $color->id)->get();
        if($images){
            foreach ($images as $image) {
                $image->is_active = 0;
                $image->save();
            }
        }

        $sizes = product_sizes::where('product_color_id', $color->id)->get();
        if($sizes){
            foreach ($sizes as $size) {
                $size->is_active = 0;
                $size->save();
            }
        }

        return "Successfully deleted";
    }
}
