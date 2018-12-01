<?php

namespace App\Http\Controllers;

use App\redes_sociales;
use Illuminate\Http\Request;
use Session;

class RedesSocialesController extends Controller
{
    public function index()
    {
        $cpro= redes_sociales::find(1);
        return view('admin.redes_sociales.editar',compact('cpro'));
    }


    public function update(Request $request)
    {
        $cpro = redes_sociales::find(1);
        $cpro->fill($request->all());
        $cpro->save();
        Session::flash('success','Los datos fueron editados');
        return back();
    }
}
