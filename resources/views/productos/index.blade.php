@extends('principal.index')
@section('contenido')

<div class="col-sm-12 align-self-center">
    @if ($rpta->tieneError)
        <h3>{{$rpta->error}}</h3>
    @else
    <div class="card">
        <div class="card-header">
            <center>
                <h3>Producto</h3>
            </center>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-9">
                    
                    <strong>Nombre:</strong>{{$rpta->objeto->producto_nombre}} 
                </div>

            </div>

        </div>

    </div>
    @endif



</div>



@stop