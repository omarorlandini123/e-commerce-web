@extends('principal.index')
@section('contenido')

<div class="col-sm-12 align-self-center">

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-4">
            <img src="/Empresa/Preview/{{$afiche->empresa->empresa_id}}/{{$token}}" width="100" height="100" alt="Cinque Terre"
                class="rounded-circle">
        </div>
        <div class="col-8" style="margin-top: 25px;">
            <h3>{{$afiche->afiche_nombre}}</h3>
            <p>{{$afiche->empresa->empresa_nombre}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @if($afiche->afiche_detalle!=null && count($afiche->afiche_detalle)>0)
                @foreach ($afiche->grupo_afiche as $grupo)
                    <h3>{{$grupo->nombre}}</h3>
                     @foreach ($grupo->afiche_detalle as $detalle)
                        <div class="card" style="margin-bottom: 10px;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <center> <img src="/Producto/Preview/{{$detalle->producto->producto_id}}/{{$token}}" width="50" height="50"
                                            alt="{{$detalle->producto->producto_nombre}}" class="rounded-circle"></center>
                                    </div>
                                    <div class="col-9" >
                                        <h5 class="card-title">{{$detalle->producto->producto_nombre}}</h5>
                                        <div class="form-group">                                
                                            <input type="number" class="form-control" name="prod:{{$detalle->producto->producto_id}}" id="prod:{{$detalle->producto->producto_id}}" aria-describedby="cantidad" placeholder="¿Cuántos quieres?">
                                            <small id="cantidad" class="form-text text-muted">Coloca la cantidad que deseas</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    @endforeach 
                    <hr>
                @endforeach

                @if(count($afiche->grupo_afiche)>0 && count($afiche->detalle_sin_grupo())>0)
                    <h3>Productos adicionales</h3>
                @endif

                @foreach ($afiche->detalle_sin_grupo() as $detalle)
                    <div class="card" style="margin-bottom: 10px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <center> <img src="/Producto/Preview/{{$detalle->producto->producto_id}}/{{$token}}" width="50" height="50"
                                        alt="{{$detalle->producto->producto_nombre}}" class="rounded-circle"></center>
                                </div>
                                <div class="col-9" >
                                    <h5 class="card-title">{{$detalle->producto->producto_nombre}}</h5>
                                    <div class="form-group">                                
                                        <input type="number" class="form-control" name="prod:{{$detalle->producto->producto_id}}" id="prod:{{$detalle->producto->producto_id}}" aria-describedby="cantidad" placeholder="¿Cuántos quieres?">
                                        <small id="cantidad" class="form-text text-muted">Coloca la cantidad que deseas</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>    
                @endforeach
                          
            @else
            <h3>Este afiche no tiene productos :(</h3>
            @endif
        </div>
    </div>

</div>



@stop