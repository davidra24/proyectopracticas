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
    private $busse;
    public function __construct(Busse $busse)
    {
        $this->busse = $busse;
    }
    public function index()
    {
        $busses = $this->busse::all();

        return response()->json($busses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $search = Busse::find($request->id);
        if ($search == null) {
            $busse = Busse::create($request->all());
            $busse->save();
            return response()->json($busse);
        } else {
            return null;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Busse  $busse
     * @return \Illuminate\Http\Response
     */
    public function show($busse)
    {
        $data = Busse::find($busse);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Busse  $busse
     * @return \Illuminate\Http\Response
     */
    public function edit(Busse $busse)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Busse  $busse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $busse)
    {
        $data = Busse::find($busse);
        if ($data == null) {
            return null;
        } else {
            $data->fill($request->all());
            $data->save();
            return response()->json($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Busse  $busse
     * @return \Illuminate\Http\Response
     */
    public function destroy($busse)
    {
        $data = Busse::find($busse);
        if ($data == null) {
            return null;
        } else {
            $data->delete();
            return true;
        }
    }
}
