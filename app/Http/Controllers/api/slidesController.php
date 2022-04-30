<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\slides;
use Illuminate\Http\Request;

class slidesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return slides::where('is_active', 1)->get();
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
        $db = new slides();
        $db->image = $request->image;
        $db->link = $request->link;
        $db->save();

        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = slides::where('is_active', 1)->find($id);
        return $db;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function edit(slides $slides)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = slides::where('is_active', 1)->find($id);
        $db->image = $request->image;
        $db->link = $request->link;
        $db->save();

        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\slides  $slides
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = slides::findOrFail($id);
        $db->is_active = 0;
        $db->save();

        return "Deleted";
    }
}
