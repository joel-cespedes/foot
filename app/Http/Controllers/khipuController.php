<?php

namespace App\Http\Controllers;

use App\dato;
use App\dpedidos;
use App\pedidos;
use FreshworkStudio\Khipu\Khipu;

use Illuminate\Http\Request;
use Session;

class khipuController extends Controller
{

    public function total(){
        $tot = new cartController();
        return $tot->total();
    }

    public function recibir(Request $request){
        return view('formulario');
    }
    public function form(Request $request)
    {
        $pedido = new pedidos();
        $pedido->nombre =$request->nombre ;
        $pedido->email =$request->email ;
        $pedido->telefono =$request->telefono ;
        $pedido->total =$this->total();
        $pedido->save();
        foreach (Session::get('cart') as $producto){
            $this->detalle_pedido($producto,$pedido->id);
        }
        $datos = dato::find(1);
        return view('gracias',compact('pedido','datos'));
    }
    protected function detalle_pedido ($producto, $pdi_id)
    {
        $critem =  new dpedidos();
        $critem->nombre = $producto->nombre;
        $critem->cantidad = $producto->cantidad;
        $critem->precio_unidad = $producto->precio;
        $critem->precio = $producto->precio*$producto->cantidad;
        $critem->pedido_id =$pdi_id;
        $critem->save();

    }
    public function pago()
    {


        $receiverId = '178564';
        $secretKey = 'd543c220b8205de8364df38e463287d6d4a17553';

        $configuration = new \Khipu\Configuration();
        $configuration->setReceiverId($receiverId);
        $configuration->setSecret($secretKey);
        $client = new \Khipu\ApiClient($configuration);
        $payments = new \Khipu\Client\PaymentsApi($client);
        try {
            $opts = array(
                "transaction_id" => uniqid(),
                "return_url" => "http://food.test/recibir",
                "cancel_url" => "http://food.test/",
                "picture_url" => "https://facilfood.cl/img/logo_paypal.png",
                "notify_url" => "http://food.test/recibir",
                "notify_api_version" => "1.3"
            );
            $response = $payments->paymentsPost("Compra de Super Alimentos Facil Food" //Motivo de la compra
                , "CLP" //Moneda
                , $this->total() //Monto
                , $opts //campos opcionales
            );

           return redirect($response['payment_url']);
        } catch (\Khipu\ApiException $e) {
            echo print_r($e->getResponseBody(), TRUE);
        }




    }
}
