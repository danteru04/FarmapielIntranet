<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function(){
    return redirect('/Nosotros');
});

Route::get('/login/google', function () {
    return Socialite::driver('google')->stateless()->redirect();
}) -> name('loginGoogle');

Route::get('/callback', function () {
    $user = Socialite::driver('google')->stateless()->user();

    // Extract the email and check the domain
    $email = $user->getEmail();
    $domain = substr(strrchr($email, "@"), 1);

    if ($domain !== 'farmapiel.com') {
        return redirect('/Nosotros')->with('Incorrecto', 'Debes iniciar sesión con un correo de la compañía.');
    }

    // Log the user in or create a new user if necessary
    // Auth::login($user);
    return redirect('/Nosotros')->with('Correct', 'Sesión iniciada correctamente');
}) -> name('callback');


Route::get('/Nosotros', function () {
    return view('FarmapielViews.Sidebar.SobreNosotros.nosotros');
}) ->name('nosotros');

Route::get('/Historia', function () {
    return view('FarmapielViews.Sidebar.SobreNosotros.historia');
}) ->name('historia');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("Blank", function(){return view('blank');});
