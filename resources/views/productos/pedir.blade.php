@extends('principal.index')
@section('contenido')

<div class="col-sm-12 align-self-center">
    @if ($rpta->tieneError)
    <h3>{{$rpta->error}}</h3>
    @else
        @if ($comprador!=null)
        <h3><strong>Hola, </strong> {{$comprador->usuario->usuario_nombre}}</h3> <br>
        <h4><strong>Confirma tu pedido de: </strong> {{$rpta->objeto->producto_nombre}}</h4>
        @else
        <center>
            <h3>Pide tu: {{$rpta->objeto->producto_nombre}}</h3>
        </center>
        @endif
        <br>
        <form action="{{route('pedido.confirmar',array('idProducto'=>$rpta->objeto->producto_id, 'token'=>$token))}}" method="post">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                        <label for="formGroupExampleInput">Confirma la cantidad</label>
                        <input type="number"  
                        onkeyup="calcular3({{$rpta->objeto->producto_id}})" 
                        class="form-control" id="txt_cantidad" 
                        name="txt_cantidad" 
                        value="{{empty($cantidad)?"0":$cantidad}}"
                        placeholder="¿Cuántos quieres?">
                    </div>
               
                    <div class="form-group">
                        
                      <p>S/. <span id="prec_{{$rpta->objeto->producto_id}}">{{
                          number_format($rpta->objeto->producto_precio,2)
                          }}</span> X <span id="prod_cant_{{$rpta->objeto->producto_id}}"> {{empty($cantidad)?"0":$cantidad}} </span>  = S/. <span class="total_prod" id="prec_total_{{$rpta->objeto->producto_id}}">{{number_format(number_format($rpta->objeto->producto_precio,2) * number_format(empty($cantidad)?"0":$cantidad,2),2)}}</span></p>
                    </div> 
                </div>
                <div class="col-sm-12">                    
                    
                    <div class="form-group">
                        <label for="txt_envio">Confirma la direccion de envío</label>
                        <input type="text"   class="form-control" id="txt_envio" name="txt_envio" value="{{empty($direccion)?"":$direccion}}"
                            placeholder="¿Dónde lo quieres?">
                    </div>
                    
                </div>


                <div class="col-sm-12">
                    <div class="form-group">
                        <center><input type="submit" class="btn btn-success" value="Pedir" /></center>
                    </div>
                </div>

                <br>
            </div>
        </form>
    @endif
</div>
@stop