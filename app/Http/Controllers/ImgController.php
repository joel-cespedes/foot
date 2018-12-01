<?php

namespace App\Http\Controllers;

use App\producto;
use App\img;
use Illuminate\Http\Request;
use Session;

class ImgController extends Controller
{
    public function index()
{
    $cpro = producto::all();
    return view('admin.img.index',compact('cpro')); }

    public function create()
    {
        $empresas = producto::where('estado',1)->pluck('nombre','id');
        return view('admin.img.crear',compact('empresas')); }

    public function store(Request $request)
    {

            if(isset($request->images)){
                foreach ($request->images as $key => $ig){
                    $la_img = new img;
                    $la_img->images =$this->imagen($ig,$request->nimages[$key],500);
                    $la_img->nimages =$request->nimages[$key];
                    $la_img->empresa_id =$request->empresa_id;
                    $la_img->save();
                }
            }
        return redirect('adm/img');
    }

    public function edit($id)
    {

        $pro = producto::find($id);
        $imagenes = $pro->image;
        $empresas = producto::where('estado',1)->pluck('nombre','id');

        return view('admin.img.editar',compact('pro','imagenes','empresas'));
    }


    public function update(Request $request, $id)
    {
            if($request->nuevo ==3){
                if(isset($request->images)){
                    foreach ($request->images as $key => $ig){
                        $la_img = new img;
                        $la_img->images =$this->imagen($ig,$request->nimages[$key],500);
                        $la_img->nimages =$request->nimages[$key];
                        $la_img->empresa_id =$id;
                        $la_img->save();
                    }
               }
            }

            foreach ($request->nimages as $key => $nigg){
                    if(isset($request->id_img[$key])){
                    $actuali = img::find($request->id_img[$key]);
                    $actuali->nimages = $nigg;
                    $actuali->empresa_id = $id;
                    $actuali->save();
                }
            }

        Session::flash('success','Los datos fueron editados');
        return redirect('adm/img');
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
        $cs = img::find($id);
        $cs->orden= $orden;
        $cs->save();
    }
}
