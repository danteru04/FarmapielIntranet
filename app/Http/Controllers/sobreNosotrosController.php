<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class sobreNosotrosController extends Controller
{
    //
    public function getNosotros(){
        $id_usuario = Auth::user()->id;
        $user = User::find($id_usuario);
        return view('FarmapielViews.Sidebar.SobreNosotros.nosotros', compact('user'));
    }
}
