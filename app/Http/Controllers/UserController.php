<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Session;
class UserController extends Controller
{
    public function index()
    {
        $cpro = User::all();
        return view('admin.user.index',compact('cpro')); }

    public function create()
    {
        return view('admin.user.crear'); }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required|min:6|confirmed'
        ]);

        $pro =  new User;
        $pro->fill($request->except(['password']));
        $pro->adm = User::ADM_NORMAL;
        $pro->password = bcrypt($request->password);
        $pro->save();
        Session::flash('success','Los datos fueron creados');
        return redirect('adm/users');
    }

    public function edit($id)
    {
        $cpro = User::find($id);

        return view('admin.user.editar',compact('cpro'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);
        $programa = User::find($id);
        $programa->fill($request->except(['password']));
        if(isset($request->password)){
            $programa->password= bcrypt($request->password);
        }
        $programa->adm = User::ADM_NORMAL;
        $programa->save();
        Session::flash('success','Los datos fueron editados');
        return redirect('adm/users');
    }


    public function destroy( $id)
    {
        $programa = User::find($id)->delete();
        Session::flash('success','El El taller fue eliminado con éxito');
        return redirect('adm/users');
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
        $cs = User::find($id);
        $cs->orden= $orden;
        $cs->save();
    }
}
