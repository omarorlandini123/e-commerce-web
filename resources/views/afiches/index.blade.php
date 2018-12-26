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
            <div class="card" style="margin-bottom: 10px;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <center> <img src="http://www.sidrafanjul.com/imagenes/producto-ribanora-g.jpg" width="50" height="50"
                                alt="Cinque Terre" class="rounded-circle"></center>
                        </div>
                        <div class="col-9" >
                            <h5 class="card-title">Card title</h5>
                            <div class="form-group">
                                
                                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="¿Cuántos quieres?">
                                <small id="emailHelp" class="form-text text-muted">Coloca la cantidad que deseas</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</div>



@stop