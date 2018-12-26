@extends('principal.index')
@section('contenido')

<div class="col-sm-12 align-self-center">

    <div class="row" style="margin-bottom: 20px;">
        <div class="col-5">
           <center> <img src="/Empresa/Preview/{{$afiche->empresa->empresa_id}}/{{$token}}" width="120" height="120" alt="Cinque Terre"
                class="rounded"></center>
        </div>
        <div class="col-7" style="margin-top: 25px;">
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
                        @include('afiches.cardProducto')
                    @endforeach 
                    <hr>
                @endforeach

                @if(count($afiche->grupo_afiche)>0 && count($afiche->detalle_sin_grupo())>0)
                    <h3>Productos adicionales</h3>
                @endif

                @foreach ($afiche->detalle_sin_grupo() as $detalle)
                    @include('afiches.cardProducto')
                @endforeach
                          
            @else
            <h3>Este afiche no tiene productos :(</h3>
            @endif
        </div>
    </div>

</div>



@stop