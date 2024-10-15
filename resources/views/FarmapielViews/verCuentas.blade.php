@extends('layouts.template')

@section("Title", "Cuentas")
@section("Descripcion", "Cuentas Registradas")

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Cuentas Registradas</h1>
    <p class="mb-4">Cuentas que han iniciado sesión o han sido registradas en la base de datos de usuarios.</p>


    @if (session('Correcto'))
        <div class="alert alert-danger alert-dismissable fade show" role="alert">
        {{ session('Correcto') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('Incorrecto'))
        <div class="alert alert-danger alert-dismissable fade show" role="alert">
        {{ session('Incorrecto') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabla de Cuentas Registradas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>E-mail</th>
                            <th>No. Empleado</th>
                            <th>Firma Interna</th>
                            <th>Puesto</th>
                            <th>Celular</th>
                            <th>Locación</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>id</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>E-mail</th>
                            <th>No. Empleado</th>
                            <th>Firma Interna</th>
                            <th>Puesto</th>
                            <th>Celular</th>
                            <th>Locación</th>
                            <table>Opciones</table>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>$user->name</td>
                            <td>$user->apellidos</td>
                            <td>$user->email</td>
                            <td>$user->no_empleado</td>
                            <td>$user->firma_interna</td>
                            <td>$user->puesto</td>
                            <td>$user->celular</td>
                            <td>$user->locacion</td>
                            <td> {{-- botones --}}
                                <div class="btn-group-sm btn-group-vertical btn-group" role="group" aria-label="Opciones">
                                    {{-- Buton de Eliminar --}}
                                    <form action="{{ route('deleteCuenta', [$user->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button is-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar la materia?')">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection