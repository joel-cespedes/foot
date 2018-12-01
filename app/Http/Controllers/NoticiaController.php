<?php

namespace App\Http\Controllers;

use App\cnoticia;
use App\noticia;
use App\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class NoticiaController extends Controller
{
    public function index()
    {
        $cpro = noticia::all();
        return view('admin.noticia.index',compact('cpro')); }


    public function create()
    {
        $producto = producto::pluck('nombre','id');
        $cnoticia = cnoticia::pluck('nombre','id');
        return view('admin.noticia.crear', compact('cnoticia','tags','producto')); }

    public function store(Request $request)
    {

        $this->validate($request,[
            'nombre'=>'required',
        ]);
        $pro =  new noticia;
        $pro->fill($request->except('img'));
        $pro->estado = isset($request->estado)? 1 : 0;
        if (isset($request->img)) {
            $pro->img = $this->imagen($request->img ,$request->nimg,500);
        };
        if($pro->save()){
            $pro->cnoticia()->attach($request->cnoticia_id);
            $pro->producto()->attach($request->producto_id);
            Session::flash('success','Los datos fueron creados');
            return redirect('adm/noticia');
        }
    }

    public function edit($id)
    {
        $producto = producto::pluck('nombre','id');
        $cpro =noticia::find($id);
        $cnoticia = cnoticia::pluck('nombre','id');
        $refproducto = $cpro->producto;
        $refCnoticia = $cpro->cnoticia->pluck('id')->toArray();
        return view('admin.noticia.editar',compact('cpro','cnoticia','producto','refCnoticia','refproducto'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre'=>'required',
        ]);
        $programa = noticia::find($id);
        $programa->fill($request->except('img'));
        $programa->estado = isset($request->estado)? 1 : 0;

        if($request->img){
            Storage::delete($programa->img);
            $programa->img = $this->imagen($request->img,$request->nimg,500);
        }
        if($programa->save()){
            $programa->cnoticia()->sync((array)$request->cnoticia_id);
            $programa->producto()->sync((array)$request->producto_id);
            Session::flash('success','Los datos fueron editados');
            return redirect('adm/noticia');
        }
    }


    public function destroy( $id)
    {
        $noticia = noticia::find($id);
        $noticia->cnoticia()->sync(null);
        Storage::delete($noticia->img);
        $noticia = $noticia->delete();
        Session::flash('success','El taller fue eliminado con éxito');
        return redirect('adm/noticia');
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
        $cs = noticia::find($id);
        $cs->orden= $orden;
        $cs->save();
    }

    public function dele_img($id){
        img::find($id)->delete();
        Session::flash('success','La imágen fue eliminada con éxito');

        return back();
    }
}
