<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_areas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'user_areas';
    protected $fillable = [
        'areas_id',
        'user_id',
    ];
}
