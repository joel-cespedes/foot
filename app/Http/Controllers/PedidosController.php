<?php

namespace App\Http\Controllers;

use App\pedidos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{

    public function index(Request $query)
    {
        $cpro = pedidos::all();
        return view('admin.pedidos.index',compact('cpro'));
    }

    public function recibido(Request $query)
    {
//        $mp=new MP("5889038471088869", "USiwhYTAsm82pBlEYtTeciiETI1ZcEjg");
//        $mp->sandbox_mode(false);

//        $pedi = new pedidos;
//        $pedi->direccion1=$query;
//        $pedi->direccion2="afuera";
//        $pedi->save();
//
//        $payment_info = $mp->get_payment_info($query['id']);
//        $pedi = new pedidos;
//        $pedi->direccion1=$payment_info;
//        $pedi->direccion2="segundo";
//        $pedi->save();


    }

    public function fina(Request $query){

//        $p = pedidos::find($query->external_reference);
//        $p->compra = 'Mercado Libre / Tarjeta de credito';
//        $p->referencia = $query->preference_id;
//        $p->save();
        return view('carrito-paso4');

    }



    public function ver_detalle($id)
    {
        $pedido = pedidos::find($id);
        return view('admin.pedidos.ver',compact('pedido'));
    }


    public function cambiar_pedido($id)
    {
        $cpro = pedidos::find($id);
        if($cpro->estado==1)  {
            $cpro->estado=0;
        } elseif($cpro->estado==0){
            $cpro->estado=1;
        }
        $cpro->save();
        return $cpro->estado;
    }

    public function cambiar_despachado($id)
    {
        $cpro = pedidos::find($id);
        if($cpro->despachado==1)  {
            $cpro->despachado=0;
        } elseif($cpro->despachado==0){
            $cpro->despachado=1;
        }
        $cpro->save();
        return $cpro->despachado;
    }

    public function cambiar_entregado($id)
    {
        $cpro = pedidos::find($id);
        if($cpro->entregado==1)  {
            $cpro->entregado=0;
        } elseif($cpro->entregado==0){
            $cpro->entregado=1;
        }
        $cpro->save();
        return $cpro->entregado;
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
        $cs = pedidos::find($id);
        $cs->orden= $orden;
        $cs->save();
    }

}
