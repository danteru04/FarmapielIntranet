@extends('layouts.template')

@section("Title", "Cuentas")
@section("Descripcion", "Cuentas Registradas")

@section('content')

<h1 class="h3 mb-2 text-gray-800">Areas de Usuario {{$user->name}}</h1>
    <p class="mb-4">Areas a la que pertenece el usuario</p>

    <button class="btn btn-primary" type="button" data-toggle="modal" data-target='#agregar-area-Modal'>
        Agregar Area
    </button>

    @if (session('Correcto'))
        <div class="alert alert-primary alert-dismissable fade show" role="alert">
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
            <h6 class="m-0 font-weight-bold text-primary">Tabla de Areas del usuario {{$user->name}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre de area</th>
                            <th>Locación</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>id</th>
                            <th>Nombre de area</th>
                            <th>Locación</th>
                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($user->areas as $area)
                        <tr>
                            <td>{{$area->id}}</td>
                            <td>{{$area->nombre_de_area}}</td>
                            <td>{{$area->locacion}}</td>
                            <td> {{-- botones --}}
                                <div class="btn-group-sm btn-group-vertical btn-group" role="group" aria-label="Opciones">
                                    {{-- Buton de Eliminar --}}
                                    <form action="{{ route('deleteCuenta', $user->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">
                                            <i class="fas fa-trash is-danger"></i>
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

    <div class="modal fade" id="agregar-area-Modal" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Area a {{$user->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('agregarAreaUsuario', $user->id)}}">
                        @csrf
                        @method('POST')
                        <div class="form-group row align-items-center">
                            <div class="col-auto my-1">
                                <label for="area" class="mr-sm-2">
                                    Area
                                </label>
                                <div class="col-sm-10">
                                    <select class="custom-select mr-sm-2" id="area" name="area">
                                        @foreach ($areasFull as $areaf)
                                        <option value="{{$areaf->id}}">{{$areaf->nombre_de_area}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>
                        </div>

                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
     </div>  

@endsection