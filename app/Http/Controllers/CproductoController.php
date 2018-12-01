<?php

namespace App\Http\Controllers;

use App\cproducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;


class CproductoController extends Controller
{
    public function index()
    {
        $cpro = cproducto::all();
        return view('admin.cproducto.index',compact('cpro')); }

    public function create()
    {
        return view('admin.cproducto.crear'); }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre'=>'required|unique:cproductos',
        ]);
        $pro =  new cproducto;
        $pro->fill($request->all());
        $pro->save();
        Session::flash('success','Los datos fueron creados');
        return redirect('adm/cproducto');
    }

    public function edit($id)
    {
        $cpro = cproducto::find($id);

        return view('admin.cproducto.editar',compact('cpro'));
    }


    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'nombre'=>'required',
        ]);
        $programa = cproducto::find($id);
        $programa->fill($request->all());
        $programa->save();
        Session::flash('success','Los datos fueron editados');
        return redirect('adm/cproducto');
    }


    public function destroy( $id)
    {

        Storage::delete(cproducto::find($id)->img);
        $programa = cproducto::find($id)->delete();
        Session::flash('success','El taller fue eliminado con éxito');
        return redirect('adm/cproducto');
    }

    public function order(Request $request)
    {
        $orden = 1;
        $array_elementos = explode(',', $request->data);
        foreach($array_elementos as $key=>$elemento):
            $id_elemento= explode('_',$elemento);
            $los_id = $id_elemento[1];
            $this->reordenar($los_id,$orden);
            $orden++;
        endforeach;
    }
    public function reordenar($id, $orden){
        $cs = cproducto::find($id);
        $cs->orden= $orden;
        $cs->save();
    }
}
