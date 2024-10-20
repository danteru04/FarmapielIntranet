<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class loginGoogleController extends Controller
{
    //
    public function authRedirect(){
        return Socialite::driver('google')->redirect();
    }

    public function authCallback() {
        $userGoogle = Socialite::driver('google')->user();

        // Extract the email and check the domain
        $email = $userGoogle->getEmail();
        $domain = substr(strrchr($email, "@"), 1);
    
        $user = User::updateOrCreate([
            'google_id' => $userGoogle->id,
            'name' => $userGoogle->name,
            'email' => $userGoogle->email,
            'url_avatar' => $userGoogle->getAvatar(),
        ]);

        if ($domain !== 'farmapiel.com') {
            return redirect('/Nosotros')->with('Incorrecto', 'Debes iniciar sesión con un correo de la compañía.');
        }
    
        // Log the user in or create a new user if necessary
        Auth::login($user);
        return redirect('/')->with('Correct', 'Sesión iniciada correctamente');
    } 




   /*
    Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
 
      $user = User::updateOrCreate([
        'github_id' => $githubUser->id,
    ], [
        'name' => $githubUser->name,
        'email' => $githubUser->email,
        'github_token' => $githubUser->token,
        'github_refresh_token' => $githubUser->refreshToken,
    ]);
 
    Auth::login($user);
 
    return redirect('/dashboard');
    }); */
    
}
