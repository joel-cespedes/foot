<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\dato;
class DatoController extends Controller
{
    public function index()
    {
        $cpro= dato::find(1);
        return view('admin.dat.editar',compact('cpro'));
    }


    public function update(Request $request)
    {

        $cpro = dato::find(1);
        $cpro->fill($request->all());
        $cpro->save();
        Session::flash('success','Los datos fueron editados');
        return back();
    }
}
