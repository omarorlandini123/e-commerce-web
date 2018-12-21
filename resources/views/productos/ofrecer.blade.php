@extends('principal.index')
@section('contenido')

<div class="col-sm-12 align-self-center">
    @if ($rpta->tieneError)
    <h3>{{$rpta->error}}</h3>
    @else
        @if ($comprador!=null) 
        <h3><strong>Hola, </strong> {{$comprador->usuario->usuario_nombre}}</h3>  <br>
        <h4><strong>Confirma tu pedido de: </strong> {{$rpta->objeto->producto_nombre}}</h4>   
        @else
        <center><h3>Pide tu: {{$rpta->objeto->producto_nombre}}</h3></center> 
        @endif
    
  
    <br><br>
    <form action="{{route('producto.pedir',array('idProducto'=>$rpta->objeto->producto_id, 'token'=>$token))}}" method="post">
        @csrf
    <div class="row">
        @if ($comprador==null)            
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="#">Ingresa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Regístrate</a>
            </li>           
        </ul>
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
        <div class="col-sm-12">
                <div class="form-group">
                    <label for="formGroupExampleInput">Direccion referencial</label>
                    <input type="text"  {{$comprador==null?"":"disabled"}}  class="form-control" id="txt_direccion" name="txt_direccion"  value ="{{$comprador==null?"":$comprador->usuario->direccion}}" placeholder="Ingresa tu direccion referencial">
                  </div>
            </div>
                   
                  
            
        @endif

        <hr>
        <div class="col-sm-12">
            <div class="form-group">
                <label for="formGroupExampleInput">Confirma la cantidad</label>
                <input type="text"   class="form-control" id="txt_cantidad" name="txt_cantidad"  value ="{{empty($cantidad)?"0":$cantidad}}"placeholder="¿Cuántos quieres?">
              </div>
              <div class="form-group">
                    <label for="txt_envio">Confirma la direccion de envío</label>
                    <input type="text"   class="form-control" id="txt_envio" name="txt_envio"  value ="{{empty($direccion)?"":$direccion}}"placeholder="¿Dónde lo quieres?">
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