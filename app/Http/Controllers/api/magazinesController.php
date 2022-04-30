<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\magazines;
use Illuminate\Http\Request;

class magazinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return magazines::where('is_active', 1)->get();
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
        $db = new magazines();
        $db->title = $request->title;
        $db->content = $request->content;
        $db->save();

        return $db;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\magazines  $magazines
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $db = magazines::where('is_active', 1)->find($id);
        return $db;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\magazines  $magazines
     * @return \Illuminate\Http\Response
     */
    public function edit(magazines $magazines)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\magazines  $magazines
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $db = magazines::where('is_active', 1)->find($id);
        $db->title = $request->title;
        $db->content = $request->content;
        $db->save();

        return $db;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\magazines  $magazines
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $db = magazines::findOrFail($id);
        $db->is_active = 0;
        $db->save();

        return "Deleted";
    }
}
