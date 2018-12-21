@extends('principal.index')
@section('contenido')

<div class="col-sm-12 align-self-center">
   
    <br>
    <form action="{{route('usuario.validar')}}"
        method="post">
        @csrf
        <div class="row">
           

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="formGroupExampleInput">Correo</label>
                    <input type="text" class="form-control" id="txt_correo" name="txt_correo" value="" placeholder="Ingresa tu correo">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="formGroupExampleInput">Contraseña</label>
                    <input type="text" class="form-control" id="txt_password" name="txt_password" value="" placeholder="Ingresa tu contraseña">
                </div>
            </div>
           
            <hr>
          
            <div class="col-sm-12">
                <div class="form-group">
                    <center>
                        <input type="submit" class="btn btn-primary" value="Ingresar" /> 
                        <a href="{{route('usuario.registro')}}" class="btn btn-success" >Registrar</a>
                    </center>
                </div>
            </div>

            <br>
        </div>
    </form>



</div>



@stop