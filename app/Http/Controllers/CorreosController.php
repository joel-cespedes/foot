<?php

namespace App\Http\Controllers;

use App\correo;
use Illuminate\Http\Request;
use Session;
class CorreosController extends Controller
{

    public function index()
    {
        $cpro = correo::all();
        return view('admin.correos.index',compact('cpro')); }


}
