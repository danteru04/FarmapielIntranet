@extends('layouts.template')

@section("Title", "Sobre Nosotros")
@section("Descripcion", "Conócenos")

@section('content')

    <div >
        <h1 class="h3 mt-3 mb-1 blur">{{$area->nombre_de_area}}</h1>
        <p class="mt-4 mb-4 text-justify blur textoCentrado">Descripcion del area</p>
        <!--div>
            <p class="quote pr-5 blur-inline">Hacemos más con menos</p>
        </div-->
    </div>

    <button class="btn btn-primary" type="button" value="Agregar Noticia" data-toggle="modal" data-target='agregar-noticia-Modal'>
        <i class="fas fa-plus"></i>
    </button>

    <div class="row">
        @foreach ($noticias as $noticia)
            <div class="col-sm-12 col">
                <div class="card shadow">
                    <img class="card-img-top" src="{{Storage::url($noticia->imagen_path)}}" alt="Imagen Noticia">
                    <div class="card-body">
                        <h5 class="card-title">{{$noticia->titulo}}</h5>
                        <p class="card-text">{{$noticia->contenido}}</p>
                        <!--a href="#" class="btn btn-primary">Go somewhere</a-->
                    </div>
                </div>
            </div>
        @endforeach
        </div>

    <!-- Modal -->
     <div class="modal fade" id="agregar-noticia-Modal" name="agregar-noticia-Modal" tabindex="1"
     role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Noticia</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{route('crearNoticia', [Auth::user()->id, $area->id])}}">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="txt_titulo" class="col-sm-2 col-form-label">
                                Titulo Noticia
                            </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="txt_titulo" placeholder="titulo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="txt_contenido" class="col-sm-2 col-form-label">
                                Contenido
                            </label>
                            <div class="col-sm-10">
                                <textarea  class="form-control" id="txt_contenido">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img_imagen" class="col-sm-2 col-form-label">
                                Imagen
                            </label>
                            <div class="col-sm-10">
                                <input class="form-control-file" id="img_imagen">
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