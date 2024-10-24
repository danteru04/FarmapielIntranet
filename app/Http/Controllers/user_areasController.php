<?php

namespace App\Http\Controllers;

use App\Models\areas;
use App\Models\User;
use App\Models\user_areas;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class user_areasController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function verAreasUsuario($id_usuario){
        $user = User::find($id_usuario);
        $areasFull = areas::all();
        return view('FarmapielViews.areas_usuario', compact('user', 'areasFull'));
    }

    public function agregarAreaUsuario(Request $request, $id_usuario){
        try{
            $areaUsuario = User::find($id_usuario);
            $areaUsuario->areas()->attach($request->area);

            #dd($request->area);

            return back()->with('Correcto', 'Area agregada a usuario correctamente');
        }
        catch (QueryException $e){
            return back()->with('Incorrecto', 'Error al intentar agregar el usuario: '.$e->getMessage() );
        }
    }
}
