<?php

namespace App\Http\Controllers;



use App\comentario;
use App\dato;
use App\noticia;
use App\cnoticia;
use App\cproducto;
use App\producto;
use App\seo;


use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\Request;



class estadisticasController extends Controller
{
    public function index(Request $query)
    {

        $cempresas = cproducto::orderBy('created_at','DESC')->get();
        $empresas = producto::orderBy('created_at','DESC')->get();
        $cnoticias = cnoticia::orderBy('created_at','DESC')->get();
        $noticias = noticia::orderBy('created_at','DESC')->get();
        $comentarios = comentario::orderBy('created_at','DESC')->get();


        $datos = dato::find(1)->visitas;

        return view('admin.index',compact('cempresas','empresas','cnoticias','noticias','comentarios','datos'));
    }

    public function ultimoDiaMes(){
        return date("d",(mktime(0,0,0,date('m')+1,1,date('Y'))-1));
    }




    public function prod_visitados()
    {
        $pro = contenido::orderBy('conteo','DESC')->take(8)->get()->toArray();
        return $pro;
    }

    public function noticias_visitas()
    {

        $noticias = noticia::orderBy('visitas','DESC')->take(10)->get();

        foreach ($noticias as $key=>$ekkk){
            $data[$key] = ['nombre'=>$ekkk->nombre,'visitas'=>$ekkk->visitas];
        }
     return   $data;
    }
    public function empresas_visitas()
    {
        $empresas = producto::orderBy('visitas','DESC')->take(10)->get();
        foreach ($empresas as $key=>$emp){
            $data[$key] = ['nombre'=>$emp->nombre,'visitas'=>$emp->visitas];
        }
        return   $data;
    }


    public function salir(){
        Auth::logout();
    }
}
