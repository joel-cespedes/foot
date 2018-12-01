<?php

namespace App\Http\Controllers;

use App\faq;
use Illuminate\Http\Request;
use Session;
class FaqsController extends Controller
{
    public function index()
    {
        $cpro = faq::all();
        return view('admin.faqs.index',compact('cpro')); }

    public function create()
    {
        return view('admin.faqs.crear'); }

    public function store(Request $request)
    {
        $this->validate($request,[
            'pregunta'=>'required|unique:faqs|min:3'
        ]);
        $pro =  new faq;
        $pro->fill($request->all());
        $pro->save();
        Session::flash('success','Los datos fueron creados');
        return redirect('adm/faq');
    }

    public function edit($id)
    {
        $pro =faq::find($id);
        return view('admin.faqs.editar',compact('pro'));
    }

    public function update(Request $request, $id)
    {
        $programa = faq::find($id);
        $programa->fill($request->all());
        $programa->save();
        Session::flash('success','Los datos fueron editados');
        return redirect('adm/faq');
    }

    public function destroy( $id)
    {
        $programa = faq::find($id)->delete();
        Session::flash('success','El El taller fue eliminado con éxito');
        return redirect('adm/faq');
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
        $cs = faq::find($id);
        $cs->orden= $orden;
        $cs->save();
    }
}
