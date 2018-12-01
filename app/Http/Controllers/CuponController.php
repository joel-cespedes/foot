<?php

namespace App\Http\Controllers;

use App\cupon;
use Illuminate\Http\Request;
use Session;

class CuponController extends Controller
{
    public function index()
    {
        $cpro = cupon::all();
        return view('admin.cupon.index',compact('cpro'));
    }

    public function create()
    {
        return view('admin.cupon.crear');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'code'=>'required',
            'cant_a_usar'=>'required',
            'type'=>'required'
        ]);
        $pro =  new cupon;
        $pro->fill($request->all());
        $pro->save();
        Session::flash('success','El cupón fue creados');
        return redirect('adm/cupon');

    }

    public function edit($id)
    {
        $cpro = cupon::find($id);
        $refCnoticia = $cpro->type;
        return view('admin.cupon.editar',compact('cpro','refCnoticia'));
    }

    public function update(Request $request, $id)
    {

        $programa = cupon::find($id);
        $programa->fill($request->all());
        $programa->save();
        Session::flash('success','El cupón fue creados');
        return redirect('adm/cupon');

    }

    public function destroy( $id)
    {

        $programa = cupon::find($id)->delete();
        Session::flash('success','El cupón fue eliminado con éxito');
        return redirect('adm/cupon');

    }


}
