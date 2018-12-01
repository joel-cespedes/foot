<?php

namespace App\Http\Controllers;

use App\nosotros;
use Illuminate\Http\Request;
use Session;

class NosotrosController extends Controller
{
    public function index()
    {
        $cpro= nosotros::find(1);
        return view('admin.nosotros.editar',compact('cpro'));
    }


    public function update(Request $request)
    {
        $cpro = nosotros::find(1);
         $cpro->m_title = $request->m_title;
        $cpro->m_description = $request->m_description;
        $cpro->m_key = $request->m_key;
        $cpro->canonical = $request->canonical;
        $cpro->nombre = $request->nombre;
        $cpro->cuerpo = $request->cuerpo;
        $cpro->save();
        Session::flash('success','Los datos fueron editados');
        return back();
    }
}
