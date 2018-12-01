<?php

namespace App\Http\Controllers;

use App\slider;
use Illuminate\Http\Request;
use Session;
class SliderController extends Controller
{

    public function index(Request $query)
    {
        $cpro = slider::all();
        return view('admin.slider.index',compact('cpro'));
    }

    public function create()
    {
        return view('admin.slider.crear');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'img'=>'required'
        ]);
        $carac = new slider;
        $carac->img =  $img = $this->imagen($request->img,$request->nimg,450);
        $carac->nimg=$request->nimg;
        $carac->titulo=$request->titulo;
        if($carac->save()) {
            Session::flash('success','Los datos fueron guardados');
            return redirect('adm/sliders');
        }else{
            Session::flash('error','Los datos no pudieron ser guardados');
            return view('admin.slider.crear');
        }
    }

    public function edit($id)
    {
        $cpro= slider::find($id);
        return view('admin.slider.editar',compact('cpro'));
    }

    public function update(Request $request, $id)
    {
        $carac = slider::find($id);
        if (isset($request->img)){
            $carac->img =  $img = $this->imagen($request->img,$request->nimg,450);
        }
        $carac->nimg=$request->nimg;
        $carac->titulo=$request->titulo;
        if($carac->save()) {
            Session::flash('success','Los datos fueron guardados');
            return redirect('adm/sliders');
        }else{
            Session::flash('error','Los datos no pudieron ser guardados');
            return view('admin.slider.crear');
        }
    }

    public function destroy($id)
    {
        slider::destroy($id);
        Session::flash('success','Los datos fueron eliminados');
        return redirect('adm/sliders');
    }


    public function cambiar_slider($id)
    {
        $cpro = slider::find($id);
        if($cpro->estado==1)  {
            $cpro->estado=0;
        } elseif($cpro->estado==0){
            $cpro->estado=1;
        }
        $cpro->save();
        return $cpro->estado;
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
        $cs = slider::find($id);
        $cs->orden= $orden;
        $cs->save();
    }
}
