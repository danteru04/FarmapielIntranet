<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\noticiasAreas;
use App\Http\Controllers\Auth;
use App\Models\User;
use App\Models\areas;

class noticiasAreasController extends Controller
{
    //
    public function __construct() {
        $this->middleware('auth');
    }

    public function getNoticiasAreas($id_area){
        $area = areas::find($id_area);
        $usuarios = User::all();
        return view('FarmapielViews.noticiasAreas.noticiasAreas', compact('area', 'usuarios'));
    }
    
    public function store(Request $request, $id_usuario, $id_area){
        try{
            $request->validate([
                'txt_titulo' => 'required|string|max:255',
                'txt_contenido' => 'required|string',
                'img_imagen' => 'nullable|image|max:2048', // Puedes agregar tamaño máximo si es necesario
            ]);

            $area = areas::find($id_area);
            if (!$area) {
                return back()->with('Incorrecto', 'El área no fue encontrada');
            }


            if ($request->hasFile('img_imagen')){
                $imagen = $request->file('img_imagen');
                #$imagen = $request->file('img_imagen')->store('public');
                $imagen = Storage::disk('public')->putFileAs('/'.$area->nombre_de_area.'/', $imagen, str()->uuid().'.'.$imagen->extension());
            }
            else{
                $imagen = null;
            }

            $noticia = new noticiasAreas();
            $noticia->titulo_noticia = $request->txt_titulo;
            $noticia->contenido = $request->txt_contenido;
            $noticia->area_id = $id_area;
            $noticia->imagen_path = $imagen;
            $noticia->fecha_de_entrada = now();
            $noticia->publicado_por = $id_usuario;

            $noticia->save();

            #return view($noticia);  
            return back()->with('Correcto', 'Se ha publicado la noticia correctamente');
        }
        catch (QueryException $e){
            return back() -> with('Incorrecto', 'Error al agregar la noticia'. $e->getMessage());
        }
    }
}
