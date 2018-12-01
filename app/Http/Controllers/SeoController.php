<?php

namespace App\Http\Controllers;

use App\seo;
use Illuminate\Http\Request;
use Session;
class SeoController extends Controller
{
    public function index(Request $query)
    {
        $cpro = seo::all();
        return view('admin.seo.index',compact('cpro'));
    }

    public function edit($id)
    {
        $cpro= seo::find($id);
        return view('admin.seo.editar',compact('cpro'));
    }

    public function update(Request $request, $id)
    {
        $cpro = seo::find($id);
        $cpro->nombre_pagina=$request->nombre_pagina;
        $cpro->m_title=$request->m_title;
        $cpro->m_descripction=$request->m_descripction;
        $cpro->m_key=$request->m_key;
        $cpro->canonical=$request->canonical;
        $cpro->save();
        Session::flash('success','Los datos fueron editados');
        return redirect('adm/seo');
    }

    public function destroy($id)
    {
        seo::destroy($id);
        Session::flash('success','Los datos fueron eliminados');
        return redirect('adm/seo');
    }
}
