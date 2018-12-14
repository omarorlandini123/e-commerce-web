@extends('principal.index')
@section('contenido')

<div class="col-sm-12 align-self-center">
  <div class="card text-white bg-danger">
    <center>
      <h5 class="card-header">Mensaje</h5>
    </center>
    <div class="card-body">
        <br>
        <center><h3><strong>Lo sentimos, </strong>{{$error}}</h3></center>
        <br>    
    </div>
  </div>
</div>

@stop
