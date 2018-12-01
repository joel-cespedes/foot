<?php

namespace App\Http\Controllers;

use App\beneficios;
use App\cproducto;
use App\producto;
use App\horario;
use App\img;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        $cpro = producto::buscador($request->nombre)->paginate(25);
        return view('admin.producto.index',compact('cpro')); }

    public function create()
    {
        $cempresa = cproducto::pluck('nombre','id');
        $tags = Tag::pluck('nombre','id');
        return view('admin.producto.crear', compact('cempresa','tags')); }

    public function store(Request $request)
    {

        $this->validate($request,[
            'nombre'=>'required|unique:productos',
        ]);
        $pro =  new producto;
        $pro->fill($request->all());
        $pro->estado = isset($request->estado)? 1 : 0;
        $pro->oferta = isset($request->oferta)? 1 : 0;
        if (isset($request->img)) {
            $pro->img = $this->imagen($request->img ,$request->nimg,500);
        }; 
        if (isset($request->img_bg)) {
            $pro->img_bg = $this->imagen($request->img_bg ,$request->nombre,500);
        };

        if($pro->save()){
            $pro->tag()->attach($request->tag_id);
               if(count($request->bene_title)>0 ){
                   foreach ($request->bene_title as $key=> $gs){
                       $bene =  new beneficios;
                       $bene->titulo =$gs;
                       $bene->nombre =isset($request->bene_nombre[$key])? $request->bene_nombre[$key]: '';
                       $bene->producto_id=$pro->id;
                       $bene->save();
                   }
               }else {
                   Session::flash('success','hubo un error, trata agregando todos los beneficios "Títulos y Nombres"');
                   return back();
               }
            Session::flash('success','Los datos fueron creados');
            return redirect('adm/producto');
        }
    }

    public function edit($id)
    {
        $cpro = producto::find($id);
        $cempresa = cproducto::pluck('nombre','id');
        $tags = Tag::pluck('nombre','id');
        $refTag = $cpro->tag;
        $bene = beneficios::where('producto_id',$id)->get();
        return view('admin.producto.editar',compact('bene','cpro','cempresa','tags','refTag','refCempresa','imagens'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nombre'=>'required',
        ]);

            if(isset($request->bene_title)){
                foreach ($request->bene_title as $key => $nigg){
                    if(isset($request->id_title_bene[$key])){
                        $actuali = beneficios::find($request->id_title_bene[$key]);
                        $actuali->titulo = isset($request->bene_title[$key])? $request->bene_title[$key]: '';;
                        $actuali->nombre = isset($request->bene_nombre[$key])? $request->bene_nombre[$key]: '';;
                        $actuali->producto_id = $id;
                        $actuali->save();
                    }else{
                        $bene = new beneficios;
                        $bene->titulo = $request->bene_title[$key];
                        $bene->nombre = isset($request->bene_nombre[$key]) ? $request->bene_nombre[$key] : '';
                        $bene->producto_id = $id;
                        $bene->save();
                    }
                }
            }



        $programa = producto::find($id);
        $programa->fill($request->all());
        $programa->estado = isset($request->estado)? 1 : 0;
        $programa->oferta = isset($request->oferta)? 1 : 0;
        if (isset($request->img)) {
            $programa->img = $this->imagen($request->img ,$request->nimg,500);
        };
         if (isset($request->img_bg)) {
            $programa->img_bg = $this->imagen($request->img_bg ,$request->nombre,500);
        };

        if($programa->save()){
            $programa->tag()->sync((array)$request->tag_id);
            Session::flash('success','Los datos fueron editados');
            return redirect('adm/producto');
        }
    }


    public function destroy( $id)
    {
        $empresa = producto::find($id);
        $empresa->tag()->sync(null);
        Storage::delete($empresa->img);
        $empresa = $empresa->delete();
        Session::flash('success','El taller fue eliminado con éxito');
        return redirect('adm/producto');
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
        $cs = producto::find($id);
        $cs->orden= $orden;
        $cs->save();
    }

    public function borrar_bene($id){
        $pro= beneficios::find($id);
        $pro->delete();
        Session::flash('success','La imágen fue eliminada con éxito');
        return back();
    }




}
