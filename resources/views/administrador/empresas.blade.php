@extends('principal.index')
@section('contenido')

<div class="col-sm-12">

    <div class="row">
        <div class="col-sm-3">
        <form action="{{ action('AdministradorController@empresas_buscar') }}" method="post">
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            <input class="form-control" type="text" name="cond" id="cond" placeholder="Buscar Empresas">
        </form>
        <br>
        <div class="list-group">
            
            @foreach ($encontrados as $emp)
                
                <a href="{{route('administrador.empresa', ['empresa_id' => $emp->empresa_id])}}" class="list-group-item list-group-item-action">{{$emp->empresa_nombre}}</a>
            @endforeach

        </div>
        <br>
            <center>
            {{ $encontrados->links() }}
            </center>
        </div>
        <div class="col-sm-9">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Detalles de la empresa</h5>
                    <div class="row">
                       
                        <div class="col-sm-6">
                        <br>
                            <label for="">Nombre</label>
                            <input class="form-control" type="text" placeholder="Nombre" value="{{$empresa->empresa_nombre}}">
                            
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <label for="">Detalle</label>
                            <input class="form-control" type="text" placeholder="Detalle" value="{{$empresa->empresa_detalle}}">
                            
                        </div>
                        <div class="col-sm-6">
                        <br>
                            <label for="">RUC</label>
                            <input class="form-control" type="text" placeholder="RUC" value="{{$empresa->empresa_RUC}}">
                            
                        </div>
                        @if($empresa->freeler!=null)
                        <div class="col-sm-6">
                        <br>
                            <label for="">Nombre Freeler</label>
                            <input class="form-control" type="text" placeholder="Freler" disabled value="{{$empresa->freeler->usuario->nombre_completo()}}">
                            
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>



@stop
