@extends('principal.index')
@section('contenido')

<div class="col-sm-12 align-self-center">
    @if ($rpta->tieneError)
    <h3>{{$rpta->error}}</h3>
    @else
     <center><h3>Pide tu: {{$rpta->objeto->producto_nombre}}</h3></center> 
  
    <br><br>
    <div class="row">
       <form action="{{route('producto.pedir',array('idProducto'=>$rpta->objeto->producto_id, 'token'=>$token))}}" method="post">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">Nombre</label>
                <input type="text" disabled class="form-control" id="txt_nombre" name="txt_nombre"  value =""placeholder="Ingresa Tu Nombre">
              </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">Apellido Paterno</label>
                <input type="text" disabled class="form-control" id="txt_ape_pa" name="txt_ape_pa"  value =""placeholder="Ingresa tu primer apellido">
              </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">Apellido Materno</label>
                <input type="text" disabled class="form-control" id="txt_ape_ma" name="txt_ape_ma"  value =""placeholder="Ingresa tu segundo apellido">
              </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">Correo</label>
                <input type="text" disabled class="form-control" id="txt_correo" name="txt_correo"  value =""placeholder="Ingresa tu correo">
              </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">DNI</label>
                <input type="text" disabled class="form-control" id="txt_dni" name="txt_dni"  value =""placeholder="Ingresa tu DNI">
              </div>
        </div>
        <hr>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">Quieres pedir</label>
                <input type="text" disabled class="form-control" id="txt_cantidad" name="txt_cantidad"  value ="{{empty($cantidad)?"0":$cantidad}}"placeholder="Ingresa tu DNI">
              </div>
        </div>
      

        <div class="col-sm-12">
            <div class="form-group" >                    
                <center><input type="submit" class="btn btn-success" value="Pedir"/></center>
            </div>
        </div>
        </form>
            <br>
    </div>

    @endif



</div>



@stop