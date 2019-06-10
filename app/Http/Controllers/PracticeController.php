<?php

namespace App\Http\Controllers;

use App\Practice;
use Illuminate\Http\Request;
use App\viewPractice;
class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $practice;

    public function __construct(Practice $practice){
        $this->practice=$practice;

    }
    public function index()
    {
        $practice=viewPractice::all();
        return response()->json($practice);
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
        $search=Practice::find($request->id);
        if($search==null){
        $practice= Practice::create($request->all());
        $practice->save();
        return response()->json($practice);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function show($practice)
    {
        $data= viewPractice::find($practice);       
        return response()->json($data);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function edit(Practice $practice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $practice)
    {
        $data= Practice::find($practice);
        if($data==null){
            return null;
        }
        else{
            $data->fill($request->all());
            $data->save();
            $practice=$data;
            return response()->json($practice);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function destroy($practice)
    {
        $data= Practice::find($practice);
        $data->managePractice()->delete();
        $data->teacher()->delete();
        $data->bus()->delete();
        $data->delete();
            
        
    }
}
