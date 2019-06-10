<?php

namespace App\Http\Controllers;

use App\ManagePractice;
use Illuminate\Http\Request;

class ManagePracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $managePractice;
    public function __construct(ManagePractice $managePractice){
        $this->managePractice=$managePractice;

    }
    
     public function index()
    {
        $data= $this->managePractice::all();
        return response()->json($data);
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
     * @param  \App\ManagePractice  $managePractice
     * @return \Illuminate\Http\Response
     */
    public function show(ManagePractice $managePractice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ManagePractice  $managePractice
     * @return \Illuminate\Http\Response
     */
    public function edit(ManagePractice $managePractice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ManagePractice  $managePractice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManagePractice $managePractice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ManagePractice  $managePractice
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManagePractice $managePractice)
    {
        //
    }
}