<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        return view('user.principal');
    }
    function reportes()
    {
        return view('user.reportes');
    }
    function reporte()
    {
        return view('user.reporte');
    }
}
