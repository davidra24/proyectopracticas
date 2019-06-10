<?php

namespace App\Http\Controllers;

use App\ManagePractice;
use Illuminate\Http\Request;
use App\ViewManagePractice;
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
        $data= ViewManagePractice::all();
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
        
        $managePractice = ManagePractice::create($request->all());
        $managePractice->save();
        return response()->json($managePractice);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ManagePractice  $managePractice
     * @return \Illuminate\Http\Response
     */
    public function show($managePractice)
    {
        $data = ViewManagePractice::where('id_practice',$managePractice)->get();
        $array = array();
        foreach($data as $t){
            $array[] = $t;
        }
        return response()->json($array);
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
    public function update(Request $request, $managePractice)
    {
        $data = ManagePractice::find($managePractice);
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
     * @param  \App\ManagePractice  $managePractice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $view = ViewManagePractice::where('id_practice',$request->id_practice)->where('id_student',$request->id_student)->first();
        $data=ManagePractice::where('id_practice',$request->id_practice)->where('id_student',$request->id_student)->first();
        
        $std=$view->id_student;
        $teacher=$view->id_teacher;
        $practice=$view->id_practice;
        $data->student()->detach($std);
        $data->teacher()->detach($teacher);
        $data->practice()->detach($practice);
        $data->delete();
        
         
        
    }
}
