<?php

namespace App\Http\Controllers;

use App\cnoticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class CnoticiaController extends Controller
{
    public function index()
    {
        $cpro = cnoticia::all();
        return view('admin.cnoticia.index',compact('cpro')); }

    public function create()
    {
        return view('admin.cnoticia.crear'); }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre'=>'required|unique:cnoticias',
        ]);

        $pro =  new cnoticia;
        $pro->fill($request->except('img'));
        if($request->img){
            $pro->img = $this->imagen($request->img,$request->nimg,400);
        }

        $pro->save();
        Session::flash('success','Los datos fueron creados');
        return redirect('adm/cnoticia');
    }

    public function edit($id)
    {
        $cpro =cnoticia::find($id);
        return view('admin.cnoticia.editar',compact('cpro'));
    }


    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'nombre'=>'required',
        ]);
        $programa = cnoticia::find($id);
        $programa->fill($request->except('img'));
        if($request->img){
            Storage::delete($programa->img);
            $programa->img = $this->imagen($request->img,$request->nimg,400);
        }
        $programa->save();
        Session::flash('success','Los datos fueron editados');
        return redirect('adm/cnoticia');
    }


    public function destroy( $id)
    {   $programa = cnoticia::find($id);
        Storage::delete($programa->img);
        $programa->delete();

        Session::flash('success','El El taller fue eliminado con éxito');
        return redirect('adm/cnoticia');
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
        $cs = cnoticia::find($id);
        $cs->orden= $orden;
        $cs->save();
    }
}
