<?php

namespace App\Http\Controllers;

use App\Busse;
use Illuminate\Http\Request;

class BusseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Busse::all();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Busse  $busse
     * @return \Illuminate\Http\Response
     */
    public function show(Busse $busse)
    {
        return $busse;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Busse  $busse
     * @return \Illuminate\Http\Response
     */
    public function edit(Busse $busse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Busse  $busse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Busse $busse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Busse  $busse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Busse $busse)
    {
        //
    }
}
