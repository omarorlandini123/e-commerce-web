@extends('principal.index')
@section('contenido')

<div class="col-sm-12 align-self-center">
    @if (!empty($rpta) && $rpta->tieneError)
        <h3>{{$rpta->error}}</h3>
    @else
        @if ($comprador!=null)
            <h3><strong>Hola, </strong> {{$comprador->usuario->usuario_nombre}}</h3> <br>
            <h4><strong>Confirma tus pedidos de </strong> {{$afiche->afiche_nombre}}</h4>       
        @endif


    <br>
    <form action="{{route('afiche.pedido.confirmar',array('idAfiche'=>$afiche->afiche_id, 'token'=>$token))}}" method="post">
        @csrf
        <div class="row">

                @php
                    $total_pagar=0;
                @endphp
                @foreach ($productos as $producto)
                    @if($producto->cantidad_sol>0)
                        <div class="col-12">
                            <label for="formGroupExampleInput">Confirma la cantidad de <strong>{{$producto->producto_nombre}}</strong></label>
                        </div>                
                        <div class="col-4">
                            <div class="form-group">
                                
                                <input type="number" class="form-control" 
                                onkeyup="calcular2({{$producto->producto_id}})" 
                                id="prod_{{$producto->producto_id}}" 
                                name="prod_{{$producto->producto_id}}" 
                                value="{{empty($producto->cantidad_sol)?"0":$producto->cantidad_sol}}"
                                    placeholder="¿Cuántos quieres?">
                            </div> 
                        </div>  
                        <div class="col-8">
                            <div class="form-group">
                                
                            <p>S/. <span id="prec_{{$producto->producto_id}}">{{number_format($producto->producto_precio,2)}}</span> X <span id="prod_cant_{{$producto->producto_id}}"> {{$producto->cantidad_sol}} </span>  = S/. <span class="total_prod" id="prec_total_{{$producto->producto_id}}">{{number_format(number_format($producto->producto_precio,2) * number_format($producto->cantidad_sol,2),2)}}</span></p>
                            </div> 
                        </div>      
                        @php
                            $total_pagar=$total_pagar+number_format(number_format($producto->producto_precio,2) * number_format($producto->cantidad_sol,2),2);
                        @endphp   
                    @endif 
                @endforeach        
            
                   
            <div class="col-sm-12">
                    <hr>
                
                
                <div class="form-group">
                    <label for="txt_envio">Confirma la direccion de envío</label>
                    
                    <input type="text" class="form-control" id="txt_envio" name="txt_envio" value="{{empty($direccion)?"":$direccion}}"
                        placeholder="¿Dónde lo quieres?">
                </div>
                <hr>
                <h3>Total de tu Pedido</h3>
                <p>Vas a pagar en total: S/.<strong id="total_pago">{{number_format($total_pagar,2)}}</strong></p>
            </div>


            <div class="col-sm-12">
                <div class="form-group">
                    <center><input type="submit" class="btn btn-success" value="Confirmar" /></center>
                </div>
            </div>

            <br>
        </div>
    </form>
    @endif



</div>



@stop