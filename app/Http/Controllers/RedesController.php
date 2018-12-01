<?php

namespace App\Http\Controllers;

use App\rede;
use Illuminate\Http\Request;
use Session;
class RedesController extends Controller
{
    public function index()
    {
        $cpro = rede::all();
        return view('admin.rede.index',compact('cpro')); }

    public function create()
    {
        return view('admin.rede.crear'); }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre'=>'required|unique:redes|min:3'
        ]);
        rede::create(['nombre'=>$request->nombre ,'url'=>$request->url,'clase'=>$request->clase])->save();
        Session::flash('success','La red social fue creada');
        return redirect('adm/rede');    }

    public function edit($id)
    {
        $cpro =rede::find($id);
        return view('admin.rede.editar',compact('cpro'));   }

    public function update(Request $request, $id)
    {
        $redes =rede::find($id);
        $redes->fill($request->only('nombre','url','clase'))->save();;
        Session::flash('success','La red social fue editada');
        return redirect('adm/rede');    }
    public function destroy($id)
    {
        rede::find($id)->delete();
        Session::flash('success','La red social fue eliminada con éxito');
        return redirect('adm/rede');   }


    public function order(Request $request)
    {
        $orden = 1;
        $array_elementos = explode(',', $request->data);
        foreach($array_elementos as $key=>$elemento):
            $id_elemento= explode('_',$elemento);
            $los_id = $id_elemento[1];
            $this->reordenar($los_id,$orden);
            $orden++;
        endforeach;    }
    public function reordenar($id, $orden){
        $cs = rede::find($id);
        $cs->orden= $orden;
        $cs->save();
    }
}
