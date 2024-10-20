<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class areas extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'areas';

    protected $fillable = [
        'nombre_de_area',
        'locacion',
    ];

    public function user(){
        return $this->belongsToMany(User::class);
    }

    public function noticias(){
        return $this->hasMany(noticiasAreas::class);
    }
}
