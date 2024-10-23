
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\verCuentasController;
use App\Http\Controllers\loginGoogleController;
use App\Http\Controllers\noticiasAreasController;
use App\Http\Controllers\sobreNosotrosController;
use App\Http\Controllers\user_areasController;

Auth::routes();

/* Route::get('/', function(){
    return view('auth/login');
});  */

Route::get('/', function(){return view('FarmapielViews.Sidebar.SobreNosotros.nosotros');})->name('Nosotros');

Route::get('/loginAdmin', function(){return view('auth/login');}) -> name('loginAdmin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("Blank", function(){return view('blank');});

Route::group(['middleware' => ['web']], function(){
    Route::get('/auth/redirect',[loginGoogleController::class, 'authRedirect']) -> name('loginGoogle');
    Route::get('/auth/callback', [loginGoogleController::class, 'authCallback']) -> name('callback');
});

Route::get('/Admin/verCuentas',[verCuentasController::class, 'getCuentas']) -> name('VerCuentas');
Route::post('(/Admin/verCuentas/Agregar', [verCuentasController::class, 'agregarCuenta'])->name('agregarCuenta');
Route::patch('/Admin/verCuentas/Editar/{id}', [verCuentasController::class, 'editarCuenta'])->name('editarCuenta');

Route::get('/Admin/verCuentas/verAreas/{id}', [user_areasController::class, 'verAreasUsuario'])->name('verAreasUsuario');
Route::post('/Admin/verCuentas/verAreas/Agregar/{id}', [user_areasController::class, 'agregarAreaUsuario'])->name('agregarAreaUsuario');
Route::post('/Admin/verCuentas/delete/{id}',[verCuentasController::class, 'deleteCuenta']) -> name('deleteCuenta');

Route::get('/Nosotros', function () {return view('FarmapielViews.Sidebar.SobreNosotros.nosotros');}) ->name('nosotros');

Route::get('/Area/Noticias/{id}',[noticiasAreasController::class, 'getNoticiasAreas'])->name('noticiasAreas');
Route::post('/Area/Noticias/Agregar/{id_usuario}/{id_area}', [noticiasAreasController::class, 'store'])->name('crearNoticia');
