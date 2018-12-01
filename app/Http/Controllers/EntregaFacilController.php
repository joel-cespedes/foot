<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\entregaFacil;

class EntregaFacilController extends Controller
{
    public function index()
    {
        $cpro= entregaFacil::find(1);
   
        return view('admin.entrega.editar',compact('cpro'));
    }


    public function update(Request $request)
    {

        $cpro = entregaFacil::find(1);
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
