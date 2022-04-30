<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\brands;
use Illuminate\Http\Request;

class brandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return brands::where('is_active', 1)->get();
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
        $db = new brands();
        $db->name = $request->name;
        $db->thumbnail = $request->thumbnail;
        $db->save();

        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = brands::where('is_active', 1)->find($id);
        return $db;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function edit(brands $brands)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = brands::where('is_active', 1)->find($id);
        $db->name = $request->name;
        $db->thumbnail = $request->thumbnail;
        $db->save();

        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\brands  $brands
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = brands::findOrFail($id);
        $db->is_active = 0;
        $db->save();
        return "Deleted";
    }
}
