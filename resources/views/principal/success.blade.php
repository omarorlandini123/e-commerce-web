@extends('principal.index')
@section('contenido')

<div class="col-sm-12 align-self-center">
  <div class="card text-white bg-success">
    <center>
      <h5 class="card-header">Mensaje</h5>
    </center>
    <div class="card-body">
        <br>
        <center><h3><strong>Genial, </strong>{{$exito}}</h3></center>
        <br>    
    </div>
  </div>
</div>

@stop
