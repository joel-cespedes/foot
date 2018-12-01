<?php

namespace App\Http\Controllers;


use App\cupon;
use App\dato;
use App\Mail\cotizacion;
use App\paypal;
use Illuminate\Http\Request;
use App\producto;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;




class cartController extends Controller
{
    public function __construct()
    {
        if (!Session::has('cart')){
        Session::put('cart', []);
        }
    }

    public function show(){
       return Session::get('cart');
    }

    public function show1()
    {   $ac = 'cart';
        $car = Session::get('cart');
        $subtotal = $this->subTotal();
        $total = $this->total();
        $datos = dato::find(1);
        $conteo_carrito = $this->conteo_carrito();
        return view('carrito',compact('car','ac','subtotal','total','datos','conteo_carrito'));
    }


    public function show2()
    {
        $car = Session::get('cart');
        $total = $this->total();
        return view('carrito-paso2',compact('car','total'));
    }
    public function add(Producto $producto,$cantidad){
        $cart = Session::get('cart');
        $producto->cantidad = $cantidad;
        $cart[$producto->url] = $producto;
        Session::put('cart',$cart);
        return count(Session::get('cart'));

    }
    public function add2(Producto $producto,$cantidad){
        $cart = Session::get('cart');
        $producto->cantidad = $cantidad;
        $cart[$producto->slug] = $producto;
        Session::put('cart',$cart);
    }

    public function up(Producto $producto, $cantidad)
    {

        $cart = Session::get('cart');
        $cart[$producto->url]->cantidad= $cantidad;
        Session::put('cart',$cart);
        return $cart[$producto->url]->precio*$cart[$producto->url]->cantidad;
    }



    public function delete(Producto $producto)
    {
        $cart = Session::get('cart');
         unset($cart[$producto->url]);
            Session::put('cart',$cart);
          return back();
    }

    public function trash(){
        Session::forget('cart');
        Session::forget('cupon');
        return back();
    }

    public function conteo_carrito(){
        $cart = Session::get('cart');
        $total = 0;
        foreach ($cart as $c) {
            $total += ($c->precio * $c->cantidad);
        }
        return  $total;
    }

    public function subTotal()
    {
        $cart = Session::get('cart');
        $total = 0;
        $cantidad = 0;
        foreach ($cart as $c) {
            $total += ($c->envio * $c->cantidad);
            $cantidad += $c->cantidad;
        }
        if($cantidad>2){
            return 0;
        }
        return  $total;
    }
    public function procesarCupon($cu)
    {
        $cupon  = cupon::where('code',$cu)->first();
        if($cupon){
            if($cupon->cant_a_usar>0){
                if(!$cupon)
                    return 26;
                if($cupon->type==1){ //porcentaje
                    $result= ($this->subTotal()*$cupon->descuento)/100;
                }
                if($cupon->type==0){ //cantidad
                    $result= $cupon->descuento;
                }
                $cupon->cant_a_usar =$cupon->cant_a_usar-1;
                $cupon->save();
                Session::put('cupon', [(int) $result,$cupon->type]);
            }else{
                return 26;
            }

        }

    }

    public function total()
    {
        $cart = Session::get('cart');
        $total = 0;
        foreach ($cart as $c) {
            $total += ($c->precio * $c->cantidad);
        }

        $total = $total + $this->subTotal();
        if (Session::has('cupon')){
            $total =  $total- Session::get('cupon')[0];
        }

        return  $total;
    }



    public function envio()
    {
        $cart = Session::get('cart');
        $total_cant = 0;
        $total_costo = 0;

        foreach ($cart as $key=> $c) {
            $total_cant= ($total_cant + $c->cantidad);
            $total_costo = $total_costo+ ($c->cantidad*$c->envio);
        }
        if($total_cant<3){
            return $total_costo;
        }else{
            return 60;
        }

    }




    public function paypal(){
        $car = Session::get('cart');
        $paypal = new paypal($car);
        $pago = $paypal->generate();
        return redirect($pago->getApprovalLink());
    }

    public function paypal2(){

        $car = Session::get('cart');
        $paypal = new paypal($car);
        $pago = $paypal->generate2();
        return redirect($pago->getApprovalLink());
    }


    public function store(Request $query){

        $car = Session::get('cart');
        $paypal = new paypal($car);
        $response = $paypal->execute($query->paymentId,$query->PayerID);

        $total =$total = $this->total();
        if($response->state= "approved"){
            $pedido= pedidos::crearPedido($response,$car,$total);
        }


        $pdi_id = $pedido->id;
        foreach($car as $ca){
            $this->detalle_pedido($ca,$pdi_id);
        }
        $pedi= pedidos::where('id',$pdi_id)->first();
        Mail::to('contacto@facilfood.cl')
            ->send(new ordenCreada($pedi));
        return view('final-cart',compact('pedido'));
    }




}
