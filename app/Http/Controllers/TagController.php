<?php

namespace App\Http\Controllers;
use App\cproducto;
use App\producto;
use App\Tag;
use Illuminate\Http\Request;
use Session;

class TagController extends Controller
{
    public function index()
    {
        $cpro = Tag::all();
        return view('admin.tag.index',compact('cpro')); }
    public function create()
    {
        $cproductos = cproducto::all();

        return view('admin.tag.crear',compact('cproductos')); }

    public function store(Request $request)
    {

        $this->validate($request,[
            'nombre'=>'required'
        ]);
        $pro =  new Tag;
        $pro->fill($request->except('empresa_id'));
        if($pro->save()){
            $pro->producto()->attach($request->producto_id);
            Session::flash('success','Los datos fueron creados');
            return redirect('adm/tag');
        }

    }

    public function edit($id)
    {
        $cpro = Tag::find($id);
        $cproductos = cproducto::all();
        $producto = $cpro->producto;

        return view('admin.tag.editar',compact('cpro','cproductos','producto'));
    }


    public function update(Request $request, $id)
    {

        $programa = Tag::find($id);
        $programa->fill($request->except('empresa_id'));
        if($programa->save()){
            $programa->producto()->sync((array)$request->producto_id);
        }
        Session::flash('success','Los datos fueron editados');
        return redirect('adm/tag');
    }


    public function destroy($id)
    {
        $empresa = Tag::find($id);
        $empresa->producto()->sync(null);
        $empresa->delete();
        Session::flash('success','El tag fue eliminado con éxito');
        return redirect('adm/tag');
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
        $cs = tag::find($id);
        $cs->orden= $orden;
        $cs->save();
    }
}
