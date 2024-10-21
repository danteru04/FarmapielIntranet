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

    public function getNoticiasAreas($id_area){
        $area = areas::find($id_area);
        $noticias = noticiasAreas::where('area_id',$id_area);
        return view('FarmapielViews.areas.'.$area->nombre_de_area.'.noticiasAreas', compact('area', 'noticias'));
    }
    
    public function store(Request $request, $id_usuario, $id_area){
        try{
            $request->validate([
                'txt_titulo'=>'required|string',
                'txt_contenido'=>'required',
                'int_area' => 'required|integer',
                'img_imagen'=>'image',
            ]);

            $area = areas::find($id_area);

            if ($request->hasFile('img_imagen')){
                $imagen = $request->file('img_imagen');
                #$imagen = $request->file('img_imagen')->store('public');
                $imagen = Storage::disk('public')->putFileAs('/'.$area->nombre_de_area.'/', $imagen, str()->uuid().'.'.$imagen->extension());
            }

            $noticia = new noticiasAreas();
            $noticia->titulo_noticia = $request->txt_titulo;
            $noticia->contenido = $request->txt_contenido;
            $noticia->area_id = $id_area;
            $noticia->imagen_path = $imagen ??= null;
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
