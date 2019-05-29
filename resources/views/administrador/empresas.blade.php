@extends('principal.index')
@section('contenido')

<div class="col-sm-12">

    <div class="row">
        <div class="col-sm-3">
        <div class="list-group">
            @inject('Empresa', 'App\Empresa')
            @foreach ($Empresa::all() as $emp)
                
                <a href="#" class="list-group-item list-group-item-action">$emp->empresa_nombre</a>
            @endforeach

        </div>
        </div>
        <div class="col-sm-9">

        </div>
    </div>


</div>



@stop
