<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class noticiasAreas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'noticiasAreas';

    protected $fillable = [
        'titulo_noticia',
        'contenido',
        'area_id',
        'imagen_path',
        'fecha_de_entrada',
        'publicado_por',
    ];

    public function areas(){
        return $this->belongsTo(areas::class);
    }
}
