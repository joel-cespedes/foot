<?php

namespace App\Http\Controllers;

use App\horario;
use App\img;
use App\producto;
use Illuminate\Http\Request;
use Session;

class HorarioController extends Controller
{
    public function index()
{
    $cpro = producto::all();
    return view('admin.img.index',compact('cpro')); }


    public function store(Request $request)
    {
        $hor = new horario;
        $hor->lunes= $request->lunes;
        $hor->martes= $request->martes;
        $hor->miercoles= $request->miercoles;
        $hor->jueves= $request->jueves;
        $hor->viernes= $request->viernes;
        $hor->sabado= $request->sabado;
        $hor->domingo= $request->domingo;
        $hor->total= $request->total;
        $hor->entrada= $request->entrada;
        $hor->salida= $request->salida;
        $hor->empresa_id= $request->empresa_id;
        $hor->save();
        return 1234;

    }



    public function empresa($id)
    {
        $empresa= producto::find($id);
        $array = $empresa->horario;
        return $array;
    }



    public function update(Request $request, $id)
    {
        if(isset($id)) {
            $hor = horario::find($id);
            $hor->lunes = $request->lunes;
            $hor->martes = $request->martes;
            $hor->miercoles = $request->miercoles;
            $hor->jueves = $request->jueves;
            $hor->viernes = $request->viernes;
            $hor->sabado = $request->sabado;
            $hor->domingo = $request->domingo;
            $hor->total = $request->total;
            $hor->entrada = $request->entrada;
            $hor->salida = $request->salida;
            $hor->empresa_id = $request->empresa_id;

            $hor->save();
            return 1234;
        }

    }

    public function destroy( $id)
    {
        if(isset($id)){
            $hor = horario::find($id);
            $hor->delete();
        }

    }


}
