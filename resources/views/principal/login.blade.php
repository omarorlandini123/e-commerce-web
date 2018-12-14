@extends('principal.index')
@section('contenido')
<div class="col-sm-4 offset-sm-4 align-self-center">
            <br><br>
            <div class="card">
                <div class="card-body">
                    <center><h2>Bienvenido</h2></center>
                    <br><br>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="txt_user">Usuario</label>
                            <input type="text" class="form-control" id="txt_user" name="txt_user"placeholder="usuario">
                        </div>
                        <div class="form-group">
                            <label for="txt_pass">Contraseña</label>
                            <input type="password" class="form-control" id="txt_pass" name="txt_pass" placeholder="Contraseña">
                        </div>
                        @if($error!=null)
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error</strong> {{$error}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        @endif
                        <center>
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                        </center>
                    </form>
                </div>
              </div>
         
            <br><br>
        
</div>
@stop
