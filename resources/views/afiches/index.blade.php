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
            <p><strong>{{$afiche->empresa->empresa_nombre}}</strong></p>
            <p>{{$afiche->afiche_descripcion}}</p>
        </div>

    </div>
    <form action="{{route('afiche.pedir',array('idAfiche'=>$afiche->afiche_id, 'token'=>$token))}}" method="get">
            @csrf
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
                @php
                    $adicionales=count($afiche->grupo_afiche)>0 && count($afiche->detalle_sin_grupo())>0;
                @endphp

                @if($adicionales)
                    <h3>Productos adicionales</h3>
                @endif

                @foreach ($afiche->detalle_sin_grupo() as $detalle)
                    @include('afiches.cardProducto')
                @endforeach

                @if($adicionales)
                    <hr>
                @endif         
                
                <h3>Total de tu Pedido</h3>
                <p>Vas a pagar en total: S/.<strong id="total_pago">0.00</strong></p>
                <center><input type="submit" class="btn btn-primary" value="Pedir"/></center>
            @else
            <h3>Este afiche no tiene productos :(</h3>
            @endif
        </div>
    </div>
    </form>
</div>



@stop