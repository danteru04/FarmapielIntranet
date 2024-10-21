@extends('layouts.template')

@section("Title", "Cuentas")
@section("Descripcion", "Cuentas Registradas")

@section('content')
    <h1 class="h3 mb-2 text-gray-800">Cuentas Registradas</h1>
    <p class="mb-4">Cuentas que han iniciado sesión o han sido registradas en la base de datos de usuarios.</p>

    <button class="btn btn-primary" title="Agregar Usuario" type="button" data-toggle="modal" data-target='#agregar-user-Modal'>
        <i class="fas fa-user-plus"></i>
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
                            <th>Opciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->apellidos}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->no_empleado}}</td>
                            <td>{{$user->firma_interna}}</td>
                            <td>{{$user->puesto}}</td>
                            <td>{{$user->celular}}</td>
                            <td>{{{$user->locacion}}}</td>
                            <td> {{-- botones --}}
                                <div class="btn-group-sm btn-group-vertical btn-group" role="group" aria-label="Opciones">
                                    {{-- Buton de Eliminar --}}
                                    <form action="{{ route('deleteCuenta', $user->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-danger" title="Eliminar" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?')">
                                            <i class="fas fa-trash is-danger"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('verAreasUsuario', $user->id)}}" method="GET">
                                        <button type="submit" class="btn-primary" title="Ver Areas">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </form>
                                    <button title="Editar Usuario" type="button" data-toggle="modal" class="btn btn-success " data-target="#editar-{{$user->id}}-Modal">
                                        <i class="fas fa-user-edit"></i>
                                    </button>
                                </div>

                                <div id="editar-{{$user->id}}-Modal" name="editar-{{$user->id}}-Modal" class="modal fade" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario {{$user->name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{route('editarCuenta', $user->id)}}">
                                                    @csrf
                                                    @method('PATCH')

                                                    <div class="form-group row align-items-center">
                                                        <div class="col my-1">
                                                            <label for="txtName" class="mr-sm-2">
                                                                Nombres
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <input type="text" value="{{$user->name}}" name="txtName" id="txtName" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        @error('txtName')
                                                            <div class="invalid-feedback">Ingresa el nombre del usuario</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group row align-items-center">
                                                        <div class="col-auto my-1">
                                                            <label for="txtApellidose" class="mr-sm-2">
                                                                Apellidos
                                                            </label>
                                                            <div class="col">
                                                                <input type="text" value="{{$user->apellidos}}" name="txtApellidos" id="txtApellidos" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        @error('txtApellidos')
                                                            <div class="invalid-feedback">Ingresa el apellido del usuario</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group row align-items-center">
                                                        <div class="col my-1">
                                                            <label for="txtEmail" class="mr-sm-2">
                                                                Correo
                                                            </label>
                                                            <div class="col">
                                                                <input type="email" value="{{$user->email}}" name="txtEmail" id="txtEmail" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        @error('txtEmail')
                                                            <div class="invalid-feedback">Ingresa el correo del usuario</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group row align-items-center">
                                                        <div class="col-auto my-1">
                                                            <label for="txtPassword" class="mr-sm-2">
                                                                Contraseña (Opcional)
                                                            </label>
                                                            <div class="col">
                                                                <input type="password" value="{{$user->password}}" name="txtPassword" id="txtPassword" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row align-items-center">
                                                        <div class="col-auto my-1">
                                                            <label for="txtNoEmpleado" class="mr-sm-2">
                                                                Numero de Empleado (Opcional)
                                                            </label>
                                                            <div class="col">
                                                                <input type="text" value="{{$user->no_empleado}}" name="txtNoEmpleado" id="txtNoEmpleado" class="form-control" >
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row align-items-center">
                                                        <div class="col-auto my-1">
                                                            <label for="txtFirmaInterna" class="mr-sm-2">
                                                                Firma Interna
                                                            </label>
                                                            <div class="col">
                                                                <input type="text" value="{{$user->firma_interna}}" name="txtFirmaInterna" id="txtFirmaInterna" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        @error('txtFirmaInterna')
                                                            <div class="invalid-feedback">Ingresa el nombre del usuario</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group row align-items-center">
                                                        <div class="col-auto my-1">
                                                            <label for="txtPuesto" class="mr-sm-2">
                                                                Puesto (Opcional)
                                                            </label>
                                                            <div class="col">
                                                                <input type="text" value="{{$user->puesto}}" name="txtPuesto" id="txtPuesto" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row align-items-center">
                                                        <div class="col-auto my-1">
                                                            <label for="txtCelular" class="mr-sm-2">
                                                                Celular (Opcional)
                                                            </label>
                                                            <div class="col">
                                                                <input type="text" value="{{$user->celular}}" name="txtCelular" id="txtCelular" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row align-items-center">
                                                        <div class="col-auto my-1">
                                                            <label for="txtLocacion" class="mr-sm-2">
                                                                Locacion
                                                            </label>
                                                            <div class="col">
                                                                <input type="text" value="SJR" default="SJR" name="txtLocacion" id="txtLocacion" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        @error('txtLocacion')
                                                            <div class="invalid-feedback">Ingresa la locación usuario</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group row">
                                                        <div class="col">
                                                            <button type="submit" class="btn btn-primary">Editar</button>
                                                        </div>
                                                        <div class="col">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="agregar-user-Modal" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('agregarCuenta')}}">
                        @csrf
                        @method('POST')
                        <div class="form-group row align-items-center">
                            <div class="col-auto my-1">
                                <label for="txtName" class="mr-sm-2">
                                    Nombres
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtName" id="txtName" class="form-control" required>
                                </div>
                            </div>
                            @error('txtName')
                                <div class="invalid-feedback">Ingresa el nombre del usuario</div>
                            @enderror
                        </div>

                        <div class="form-group row align-items-center">
                            <div class="col-auto my-1">
                                <label for="txtApellidose" class="mr-sm-2">
                                    Apellidos
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtApellidos" id="txtApellidos" class="form-control" required>
                                </div>
                            </div>
                            @error('txtApellidos')
                                <div class="invalid-feedback">Ingresa el apellido del usuario</div>
                            @enderror
                        </div>

                        <div class="form-group row align-items-center">
                            <div class="col-auto my-1">
                                <label for="txtEmail" class="mr-sm-2">
                                    Correo
                                </label>
                                <div class="col-sm-10">
                                    <input type="email" name="txtEmail" id="txtEmail" class="form-control" required>
                                </div>
                            </div>
                            @error('txtEmail')
                                <div class="invalid-feedback">Ingresa el correo del usuario</div>
                            @enderror
                        </div>

                        <div class="form-group row align-items-center">
                            <div class="col-auto my-1">
                                <label for="txtPassword" class="mr-sm-2">
                                    Contraseña (Opcional)
                                </label>
                                <div class="col-sm-10">
                                    <input type="password" name="txtPassword" id="txtPassword" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <div class="col-auto my-1">
                                <label for="txtNoEmpleado" class="mr-sm-2">
                                    Numero de Empleado (Opcional)
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtNoEmpleado" id="txtNoEmpleado" class="form-control" >
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <div class="col-auto my-1">
                                <label for="txtFirmaInterna" class="mr-sm-2">
                                    Firma Interna
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtFirmaInterna" id="txtFirmaInterna" class="form-control" required>
                                </div>
                            </div>
                            @error('txtFirmaInterna')
                                <div class="invalid-feedback">Ingresa el nombre del usuario</div>
                            @enderror
                        </div>

                        <div class="form-group row align-items-center">
                            <div class="col-auto my-1">
                                <label for="txtPuesto" class="mr-sm-2">
                                    Puesto (Opcional)
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtPuesto" id="txtPuesto" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <div class="col-auto my-1">
                                <label for="txtCelular" class="mr-sm-2">
                                    Celular (Opcional)
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtCelular" id="txtCelular" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <div class="col-auto my-1">
                                <label for="txtLocacion" class="mr-sm-2">
                                    Locacion
                                </label>
                                <div class="col-sm-10">
                                    <input type="text" value="SJR" default="SJR" name="txtLocacion" id="txtLocacion" class="form-control" required>
                                </div>
                            </div>
                            @error('txtLocacion')
                                <div class="invalid-feedback">Ingresa la locación usuario</div>
                            @enderror
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
     
     @if ($errors->has('txtName') || $errors->has('txtApellidos') || $errors->has('txtEmail') || $errors->has('txtFirmaInterna')|| $errors->has('txtLocacion'))
        <script>
            document.getElementById('agregar-user-Modal').classList.add('is-active');
        </script>
    @endif
    
@endsection