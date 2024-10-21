<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Database\QueryException;

class verCuentasController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function getCuentas(){
        $users = User::all();
        return view('FarmapielViews.verCuentas', compact('users'));
    }

    public function deleteCuenta($usuario){
        $user = User::find($usuario);
        $user::delete();
    }

    public function agregarCuenta(Request $request){
        try{
            $request->validate([
                'txtName'=>'required|string',
                'txtEmail'=>'required',
                'txtFirmaInterna'=>'required|string',
                'txtPuesto'=>'required',
                'txtLocacion'=>'required',
            ]);

            $user = new User();
            $user -> name = $request -> txtName;
            $user -> apellidos = $request -> txtApellidos;
            $user -> email = $request -> txtEmail;
            $user -> password = $request -> txtPassword;
            $user -> no_empleado = $request -> txtNoempleado;
            $user -> firma_interna = $request -> txtFirmaInterna;
            $user -> puesto = $request -> txtPuesto;
            $user -> celular = $request -> txtCelular;
            $user -> locacion = $request -> txtLocacion;
            
            
            $user -> save();
            return back()->with('Correcto', 'Se ha agregado el usuario correctamente');
        }
        catch (QueryException $e){
            return back()->with('Incorrecto', 'Error, no se ha agregado el usuario: '.$e->getMessage());
        }
    }

    public function editarCuenta(Request $request, $id_usuario){
        try{
            $user = User::find($id_usuario);
            $user -> name = $request -> txtName;
            $user -> apellidos = $request -> txtApellidos;
            $user -> email = $request -> txtEmail;
            $user -> password = $request -> txtPassword;
            $user -> no_empleado = $request -> txtNoempleado;
            $user -> firma_interna = $request -> txtFirmaInterna;
            $user -> puesto = $request -> txtPuesto;
            $user -> celular = $request -> txtCelular;
            $user -> locacion = $request -> txtLocacion;
            
            
            $user -> save();
            return back()->with('Correcto', 'Se ha editado el usuario correctamente');
        }
        catch(QueryException $e) {
            return back()->with('Incorrecto', 'Error, no se ha editado el usuario: '.$e->getMessage());
        }
    }
}
