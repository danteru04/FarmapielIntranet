
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\verCuentasController;
use App\Http\Controllers\loginGoogleController;

Auth::routes();

/* Route::get('/', function(){
    return view('auth/login');
});  */

Route::get('/', function(){return view('FarmapielViews.Sidebar.SobreNosotros.nosotros');});

Route::group(['middleware' => ['web']], function(){
    Route::get('/auth/redirect',[loginGoogleController::class, 'authRedirect']) -> name('loginGoogle');
    Route::get('/auth/callback', [loginGoogleController::class, 'authCallback']) -> name('callback');
});

Route::get('/Admin/verCuentas',[verCuentasController::class, 'getCuentas']) -> name('VerCuentas');
Route::post('/Admin/verCuentas/delete/{id}',[verCuentasController::class, 'deleteCuenta']) -> name('deleteCuenta');

Route::get('/Nosotros', function () {return view('FarmapielViews.Sidebar.SobreNosotros.nosotros');}) ->name('nosotros');

Route::get('/loginAdmin', function(){return view('auth/login');}) -> name('loginAdmin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("Blank", function(){return view('blank');});
