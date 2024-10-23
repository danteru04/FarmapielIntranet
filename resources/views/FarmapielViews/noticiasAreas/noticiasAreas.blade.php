@extends("layouts.template")

@section("Title", "Noticias {{$area->nombre_de_area}}")
@section("Descripcion", "Noicias relevantes del área")

@section("content")
    <h1 >Noticias para {{$area->nombre_de_area}}</h1>
@endsection