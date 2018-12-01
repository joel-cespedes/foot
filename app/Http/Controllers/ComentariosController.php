<?php

namespace App\Http\Controllers;

use App\comentario;
use App\producto;
use Illuminate\Http\Request;
use Session;
use Sitemap;


class comentariosController extends Controller
{
    public function index()
    {
        $cpro = comentario::paginate(50);
        return view('admin.comentario.index',compact('cpro')); }

    public function create()
    {
        return view('admin.comentario.crear'); }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre'=>'required'
        ]);

        $pro =  new comentario;
        $pro->fill($request->all());

        $pro->save();
        Session::flash('success','Los datos fueron creados');
        return redirect('adm/comentario');
    }

    public function edit($id)
    {
        $cpro =comentario::find($id);

        $empresa_all = producto::pluck('nombre','id');

        $empresa = producto::whereHas('comentario')->pluck('id')->toArray();

        return view('admin.comentario.editar',compact('cpro','empresa_all','empresa'));
    }


    public function update(Request $request, $id)
    {
        $programa = comentario::find($id);
        $programa->fill($request->all());
        $programa->estado = isset($request->estado)? 1 : 0;

        $programa->save();
        Session::flash('success','Los datos fueron editados');
        return redirect('adm/comentario');
    }


    public function destroy( $id)
    {
        $programa = comentario::find($id)->delete();
        Session::flash('success','El El taller fue eliminado con éxito');
        return redirect('adm/comentario');
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
        $cs = comentario::find($id);
        $cs->orden= $orden;
        $cs->save();
    }
    public function cambiar_comentario($id)
    {
        $cpro = comentario::find($id);
        if($cpro->estado==1)  {
            $cpro->estado=0;
        } elseif($cpro->estado==0){
            $cpro->estado=1;
        }
        $cpro->save();
        return $cpro->estado;
    }

}
