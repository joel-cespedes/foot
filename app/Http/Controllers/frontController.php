<?php

namespace App\Http\Controllers;

use App\como_comprar;
use App\como_pagar;
use App\newsletters_mayorista;
use App\cnoticia;
use App\comentario;
use App\dato;
use App\entregaFacil;
use App\mayorista;
use App\metodo_envio;
use App\newsletter;
use App\pedidos;
use App\dpedidos;
use App\rede;
use App\politicaCookie;
use App\politicaPrivacidad;
use App\producto;
use App\noticia;
use App\nosotros;
use App\faq;
use App\Tag;
use App\correo;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Session;
use App\Mail\contacto;
use App\Mail\cotizacion;
use Illuminate\Support\Facades\Mail;
use App\seo;



class frontController extends Controller
{
    public function index()
    {
        $seo = seo::find(1);
        $datos = dato::find(1);
        $producto = producto::where('estado', 1)->orderBy('id', 'ASC')
            ->take(5)->get();
        $datos = dato::find(1);
        $datos->visitas= $datos->visitas+1;
        $datos->save();
        $tag = tag::all();
        $redes =rede::all();

        return view('index', compact('redes','tag','datos', 'producto', 'seo'));
    }
    public function buscador(Request $query)
    {
        $seo = seo::find(2);
        $redes =rede::all();
        $productos = producto::buscador($query->nombre)->where('estado', 1)->get();
        return view('plantilla_productos', compact('productos','seo','redes'));
    }

    public function buscadorTruco(Request $query)
    {
        $ctrucos  = cnoticia::take(10)->get();
        $seo = seo::find(3);
        $blogs = noticia::buscador($query->nombre)->where('estado', 1)->paginate(15);
        $trucos = noticia::where('estado',1)->orderby('visitas','ASC')->take(5)->get();
        return view('blog', compact('blogs', 'seo','ctrucos','trucos'));
    }


    public function ctruco()
    {
        $ctrucos  = cnoticia::take(10)->get();
        $seo = seo::find(3);
        $blogs = noticia::where('estado', 1)->orderby('created_at','DESC')->paginate(20);
        $trucos = noticia::where('estado',1)->orderby('visitas','ASC')->take(3)->get();
        return view('blog', compact('blogs', 'seo','ctrucos','trucos'));
    }



    public function trucos($slug)
    {
        $cno = cnoticia::where('slug',$slug)->first();
        if(isset($cno)){
            $ctrucos  = cnoticia::all();
            $trucos = noticia::where('estado',1)->orderby('visitas','ASC')->take(5)->get();

            $blogs = $this->paginacion($cno->noticia);
            return view('blog', compact('blogs', 'seo_empresa','ctrucos','trucos'));

             } else {
        return view('404error');
        }
    }



    public function producto($slug)
    {
        $producto= producto::where('url', $slug)->first();
        $truco = noticia::where('slug', $slug)->first();

        if (isset($producto)) {
            $producto->visitas = $producto->visitas+1;
            $producto->save();
            $redes = rede::all();
            $los_pack = producto::where('id','!=',$producto->id)->get();
           return view('detalle', compact('producto','los_pack','redes'));
        } elseif (isset($truco)){
            $ctrucos  = cnoticia::all();
            $truco->visitas = $truco->visitas+1;
            $truco->save();
            $trucos = noticia::where('estado',1)->orderby('visitas','DESC')->take(3)->get();
            return view('detalle_blog', compact('truco','ctrucos','trucos'));
        }


        else {
            return view('404error');
        }
    }
    public function tienda()
    {
        $seo = seo::find(2);
        $redes =rede::all();
        $productos = producto::where('estado',1)->get();

        return view('plantilla_productos', compact('productos','seo','redes'));

    }

    public function tag($slug)
    {
        $seo = seo::find(2);
        $redes =rede::all();
        $cno = tag::where('id', explode('-', $slug)[0])->first();
        $productos = $this->paginacion($cno->producto);
        return view('plantilla_productos', compact('productos','seo','redes'));
    }


    public function subir_imagen(Request $request)
    {
        $file = $request->file('file');
        $nombreImagen = uniqid() . $file->getClientOriginalName();
        $path = public_path() . '/img/';
        $file->move($path, $nombreImagen);
        $array = array(
            'url' => url('img/' . $nombreImagen),
            'id' => rand(10, 100000000)
        );
        return $array;
    }



    public function politicaCookies()
    {
        $seo = seo::find(14);
        $interno = politicaCookie::find(1);
        return view('contenido', compact('interno', 'seo'));
    }

    public function politicaPrivacidad()
    {
        $seo = seo::find(13);
        $interno = politicaPrivacidad::find(1);

        return view('contenido', compact('interno', 'seo'));
    }
    public function entrega()
    {
        $seo = seo::find(13);
        $interno = entregaFacil::find(1);
        return view('contenido', compact('interno', 'seo'));
    }

    public function nosotros()
    {
        $seo = seo::find(7);
        $interno = nosotros::find(1);
        return view('contenido', compact('interno', 'seo'));
    }

    public function contacto()
    {
        $seo = seo::find(4);
        $datos = dato::find(1);
        $redes = rede::all();
        return view('contacto', compact('redes','interno', 'seo','datos'));
    }

    public function faq()
    {
        $seo = seo::find(5);
        $faq = faq::all();
        return view('faqs', compact('faq', 'seo'));
    }


    public function comentario_producto(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'comentario' => 'required'
        ]);

        $nuev = new comentario;
        $nuev->nombre = $request->nombre;
        $nuev->comentario = $request->comentario;
        $nuev->estado = 0;
        $nuev->puntuacion = $request->puntuacion;
        $nuev->producto_id = $request->producto_id;
        $nuev->noticia_id = null;
        $nuev->save();
        Session::flash('success', 'El comentarío saldrá luego de ser aprobado por el administrador');
        return back();
    }

    public function comentario_noticia(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'comentario' => 'required'
        ]);
        $nuev = new comentario;
        $nuev->nombre = $request->nombre;
        $nuev->comentario = $request->comentario;
        $nuev->estado = 0;
        $nuev->puntuacion = $request->puntuacion;
        $nuev->producto_id = null;
        $nuev->noticia_id = $request->noticia_id;
        $nuev->save();

        Session::flash('success', 'El comentarío saldrá luego de ser aprobado por el administrador');
        return back();
    }

    public function email(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required',
            'mensaje' => 'min:3',
//            'g-recaptcha-response' => 'required|recaptcha',
        ]);
        Mail::to('contacto@facilfood.cl', 'Facilfood.com')
            ->send(new contacto($request->all()));

        $correo = new correo;
        $correo->nombre = $request->nombre;
        $correo->remitente = $request->email;
        $correo->correo = $request->mensaje;
        $correo->save();

	
        Session::flash('success', 'Tu email ha sido enviado');
        return back();
    }

    public function newsletter(Request $query)
    {
        $this->validate($query,[
            'nombre'=>'required',
            'email'=>'required|unique:newsletters',
        ]);
        $nuevo = new newsletter;
        $nuevo->fill($query->only('nombre','email'));
        $nuevo->save();
        Session::flash('success', 'Gracias por ponerte en contacto');
        return back();
    }
    public function newsletter_mayorista(Request $query)
    {
        $this->validate($query,[
            'nombre'=>'required',
            'email'=>'required|unique:newsletters',
        ]);
        $nuevo = new newsletters_mayorista;
        $nuevo->fill($query->only('nombre','email'));
        $nuevo->save();
        Session::flash('success', 'Gracias por ponerte en contacto');
        return back();
    }

    public function paginacion($colleccion){
        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $results = $colleccion->slice(($page-1)* $perPage, $perPage)->values();
        $pagined = new LengthAwarePaginator($results,$colleccion->count(),$perPage,$page, [
            'path' =>LengthAwarePaginator::resolveCurrentPath(), ]);
        $pagined->appends(request()->all());
        return $pagined;
    }


    public function email_cotizacion(Request $query){

        if(Session::get('cart')==null){
            return view('deber');
        }
        $this->validate($query,[
            'nombre'=>'required',
            'email'=>'required',
            'telefono'=>'required',
            'img' => 'max:5000',
        ]);

        Mail::to('contacto@facilfood.cl','Compra desde Facilfood')
            ->send( new cotizacion($query->all(),Session::get('cart')));


        $total = 0;
        $cart = \Session::get('cart');
        foreach($cart as $ca){
            $total += ($ca->precio * $ca->cantidad);
        }

        $pedido = new pedidos;
        $pedido->nombre =$query->nombre ;
        $pedido->email =$query->email ;
        $pedido->telefono =$query->telefono ;
        $pedido->ci =$query->identificacion;
        $pedido->direccion1 =$query->direccion;
        $pedido->mensaje_cliente =$query->mensaje ;

        if (isset($query->img)) {
  
            $file =  $query->file('img');
            $nombreImagen = uniqid(). $file->getClientOriginalName();
            $path = public_path().'/img';
            $file->move($path,$nombreImagen);
            $pedido->img =$nombreImagen;
        };
        $pedido->total =$total;
        $pedido->save();
        foreach (Session::get('cart') as $producto){
            $this->detalle_pedido($producto,$pedido->id);
        }

        $this->trash();
        $datos = dato::find(1);
        return view('gracias',compact('pedido','datos'));
    }

    protected function detalle_pedido ($producto, $pdi_id)
    {
        $critem =  new dpedidos;
        $critem->nombre = $producto->nombre;
        $critem->cantidad = $producto->cantidad;
        $critem->precio_unidad = $producto->precio;
        $critem->precio = $producto->precio*$producto->cantidad;
        $critem->pedido_id =$pdi_id;
        $critem->save();

    }

    protected function trash ()
    {
        Session::forget('cart');
        Session::forget('cupon');
    }

    protected function mayorista()
    {
        $interno = mayorista::find(1);
        return view('contenido',compact('interno'));
    }

    protected function como_comprar()
    {
        $interno = como_comprar::find(1);
        return view('contenido',compact('interno'));
    }

    protected function como_pagar()
    {
        $interno = como_pagar::find(1);
        return view('contenido',compact('interno'));
    }

    protected function metodo_envio()
    {
        $interno = metodo_envio::find(1);
        return view('contenido',compact('interno'));
    }





}
