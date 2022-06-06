<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\product_colors;
use App\Models\product_images;
use App\Models\products;
use Illuminate\Http\Request;

class product_imagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = product_colors::where('is_active', 1)->with('product')->get();
        $images = product_images::where('is_active', 1)->with('color')->orderBy('product_color_id')->get();
        return ['images' => $images, 'colors' => $colors];
    }

    public function uploadFile(Request $request) {
        $type = $request->type;
        $data = $request->file('file');
        $filename = $request->file('file')->getClientOriginalName();
        $path = public_path('/assets/img/products/');
        $data->move($path, $filename);
        return response()->json([
            'success' => 'done',
            'valueimg'=>$data ]);
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
        $image = new product_images();
        $image->product_color_id = $request->product_color_id;
        $image->image = $request->image;
        $image->save();

        return $this->show($image->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = product_images::where('is_active', 1)->with('color')->find($id);
        return $db;
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function edit(product_images $product_images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = product_images::where('is_active', 1)->find($id);
        $db->product_color_id = $request->product_color_id;
        $db->image = $request->image;
        $db->save();
        return $this->show($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = product_images::find($id);
        $db->is_active = 0;
        $db->save();
        return 'Deleted';
    }
}
