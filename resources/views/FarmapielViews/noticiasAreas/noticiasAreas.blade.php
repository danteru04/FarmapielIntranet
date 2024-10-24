@extends("layouts.template")

@section("Title", "Noticias {{$area->nombre_de_area}}")
@section("Descripcion", "Noicias relevantes del área")

@section("content")
    <div class="fachada shadow">
        <h1 class="h3 mt-3 mb-1 blur text-white">{{$area->nombre_de_area}}</h1>
        <p class="mt-4 mb-4 text-justify blur textoCentrado text-white">Descripcion del area</p>
    </div>

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

    <button class="btn btn-primary my-3" type="button" value="Agregar Noticia" data-toggle="modal" data-target='#agregar-noticia-Modal'>
        <i class="fas fa-plus"></i>
        Agregar Noticia
    </button>

    <div class="container shadow">
        <div class="">
            <h1 class="h3 mb-2 p-3 text-gray-800">Noticias de {{$area->nombre_de_area}}</h1>
            <p class="mb-4">Noticias relevantes del area de {{$area->nombre_de_area}}.</p>
        </div>

        <div class="row">
            @foreach ($area->noticias as $noticia)
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card text-center shadow my-3">
                    @if($noticia->imagen_path != null)
                    <img class="card-img-top" src="{{Storage::url($noticia->imagen_path)}}" alt="Imagen Noticia">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title"><strong>{{$noticia->titulo_noticia}}</strong></h5>
                        <p class="card-text">{{$noticia->contenido}}</p>
                        <!--a href="#" class="btn btn-primary">Go somewhere</a-->
                    </div>
                    <div class="card-footer text-muted">
                        <small>{{$noticia->fecha_de_entrada}}</small> <br>
                        @foreach($usuarios as $usuario)
                            @if ($usuario->id == $noticia->publicado_por)
                            <small>{{$usuario->name}}</small>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

     <!-- Modal -->
     <div class="modal fade" id="agregar-noticia-Modal" tabindex="-1"
     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Noticia a {{$area->nombre_de_area}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('crearNoticia', [Auth::user()->id, $area->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group row align-items-center mx-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Titulo de Noticia</span>
                                </div>
                                <input type="text" name="txt_titulo" id="txt_titulo" class="form-control" aria-describedby="basic-addon1" required>
                            </div>
                            @error('txt_titulo')
                                <div class="invalid-feedback">Ingresa el titulo de la noticia</div>
                            @enderror
                        </div>       
                        
                        <div class="form-group row align-items-center">
                            <div class="col">
                                <label for="txt_contenido" class="mr-sm-2">
                                    Contenido de la Noticia
                                </label>
                                <div class="col">
                                    <textarea rows="3" name="txt_contenido" id="txt_contenido" class="form-control" required></textarea>
                                </div>
                            </div>
                            @error('txt_contenido')
                                <div class="invalid-feedback">Ingresa el nombre del usuario</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="img_imagen">Imagen de la noticia (Opcional)</label>
                            <input type="file" class="form-control-file" id="img_imagen" name="img_imagen" accept="image/png, image/gif, image/jpeg" >
                          </div>
                    
                        <div class="form-group row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary">Agregar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     </div>  

     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


@endsection