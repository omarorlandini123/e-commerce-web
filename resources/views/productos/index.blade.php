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
            <h5 class="card-title"></h5>
            <p class="card-text"></p>
            <p class="card-text"></p>
        </div>
    </div>
    <br><br>
    <div class="row">
       
        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">Nombre</label>
                <input type="text" disabled class="form-control" id="formGroupExampleInput"  value ="{{$rpta->objeto->producto_nombre}}"placeholder="Example input">
              </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripcion</label>
                <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3">{{$rpta->objeto->producto_descripcion}}</textarea>
              </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">Precio</label>
                <input type="text" class="form-control"  disabled id="formGroupExampleInput"  value ="S/. {{number_format( $rpta->objeto->producto_precio, 2)   }}"placeholder="Example input">
              </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">Válido Hasta</label>
                <input type="text" class="form-control" disabled id="formGroupExampleInput"  value ="{{\Carbon\Carbon::parse($rpta->objeto->producto_hasta)->format('d/m/Y')}}"placeholder="Example input">
              </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">Cantidad</label>
                <input type="number" class="form-control" id="txt_cantidad" name="txt_cantidad"  placeholder="¿Cuantos quieres?" value ="">
              </div>
        </div>

        <div class="col-sm-12">
                <div class="form-group" >                    
                    <center><button type="button" class="btn btn-success">Pedir</button></center>
                  </div>
            </div>
            <br>
    </div>

    @endif



</div>



@stop