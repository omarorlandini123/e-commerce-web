@extends('principal.index')
@section('contenido')

<div class="col-sm-12 align-self-center">
    @if ($rpta->tieneError)
    <h3>{{$rpta->error}}</h3>
    @else
     <center><h3>{{$rpta->objeto->producto_nombre}}</h3></center> 
    <div class="card bg-dark text-white">
        <img class="card-img" src="/Producto/Preview/{{$rpta->objeto->producto_id}}/{{$token}}" alt="Card image">
        <div class="card-img-overlay">
            <h5 class="card-title">{{$rpta->objeto->producto_nombre}}</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                content. This content is a little bit longer.</p>
            <p class="card-text">Last updated 3 mins ago</p>
        </div>
    </div>
    @endif



</div>



@stop