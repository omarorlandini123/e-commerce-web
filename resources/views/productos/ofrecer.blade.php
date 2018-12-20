@extends('principal.index')
@section('contenido')

<div class="col-sm-12 align-self-center">
    @if ($rpta->tieneError)
    <h3>{{$rpta->error}}</h3>
    @else
     <center><h3>Pide tu: {{$rpta->objeto->producto_nombre}}</h3></center> 
  
    <br><br>
    <form action="{{route('producto.pedir',array('idProducto'=>$rpta->objeto->producto_id, 'token'=>$token))}}" method="post">
        @csrf
    <div class="row">
      
        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">Nombre</label>
                <input type="text" {{$comprador==null?"":"disabled"}}  class="form-control" id="txt_nombre" name="txt_nombre"  value ="{{$comprador==null?"":$comprador->usuario->usuario_nombre}}"placeholder="Ingresa Tu Nombre">
              </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">Apellido Paterno</label>
                <input type="text" {{$comprador==null?"":"disabled"}}   class="form-control" id="txt_ape_pa" name="txt_ape_pa"  value ="{{$comprador==null?"":$comprador->usuario->usuario_apellidoPa}}" placeholder="Ingresa tu primer apellido">
              </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">Apellido Materno</label>
                <input type="text" {{$comprador==null?"":"disabled"}}   class="form-control" id="txt_ape_ma" name="txt_ape_ma"  value ="{{$comprador==null?"":$comprador->usuario->usuario_apellidoMa}}" placeholder="Ingresa tu segundo apellido">
              </div>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">Correo</label>
                <input type="text"  {{$comprador==null?"":"disabled"}}  class="form-control" id="txt_correo" name="txt_correo"  value ="{{$comprador==null?"":$comprador->usuario->usuario_email}}" placeholder="Ingresa tu correo">
              </div>
        </div>

        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">DNI</label>
                <input type="text"  {{$comprador==null?"":"disabled"}}   class="form-control" id="txt_dni" name="txt_dni"  value ="{{$comprador==null?"":count($comprador->usuario->documentos)>0?$comprador->usuario->documentos[0]->documento_numero:""}}" placeholder="Ingresa tu DNI">
              </div>
        </div>
        <hr>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">Quieres pedir</label>
                <input type="text"   class="form-control" id="txt_cantidad" name="txt_cantidad"  value ="{{empty($cantidad)?"0":$cantidad}}"placeholder="Ingresa tu DNI">
              </div>
        </div>
      

        <div class="col-sm-12">
            <div class="form-group" >                    
                <center><input type="submit" class="btn btn-success" value="Pedir"/></center>
            </div>
        </div>
        
            <br>
    </div>
</form>
    @endif



</div>



@stop