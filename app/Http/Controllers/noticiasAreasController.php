<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\noticiasAreas;
use App\Http\Controllers\Auth;
use App\Models\User;

class noticiasAreasController extends Controller
{
    //
    public function store(Request $request, $id_usuario, $id_area){
        try{
            $request->validate([
                'txt_titulo'=>'required|string',
                'txt_contenido'=>'required',
                'int_area' => 'required|integer',
                'img_imagen'=>'image',
            ]);

            if ($request->hasFile('img_imagen')){
                $imagen = $request->file('img_imagen')->store('public');
            }

            $noticia = new noticiasAreas();
            $noticia->titulo_noticia = $request->txt_titulo;
            $noticia->contenido = $request->txt_contenido;
            $noticia->area_id = $id_area;
            $noticia->imagen_path = $request->img_imagen;
            $noticia->fecha_de_entrada = now();
            $noticia->publicado_por = $id_usuario;

            $noticia->save();

            return back()->with('Correcto', 'Se ha publicado la noticia correctamente');
        }
        catch (QueryException $e){
            return with('Incorrecto', 'Error al agregar la noticia'. $e);
        }
    }
}
