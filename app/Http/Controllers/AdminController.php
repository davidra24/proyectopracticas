<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.principal');
    }
    function estudiantes()
    {
        return view('admin.estudiantes');
    }
    function practicas()
    {
        return view('admin.practicas');
    }
    function practica()
    {
        return view('admin.practica');
    }
    function docentes()
    {
        return view('admin.docentes');
    }
    function buses()
    {
        return view('admin.buses');
    }
}
