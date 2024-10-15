<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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
}
