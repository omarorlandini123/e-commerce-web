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
                    
                    <label for="usuario_email">Correo</label>
                    <input type="text" class="form-control {{$errors->has('usuario_email')?"is-invalid":""}}" id="usuario_email" name="usuario_email" placeholder="Ingresa tu correo" required>
                    @if ($errors->has('usuario_email'))
                    <div class="invalid-feedback">
                            {{$errors->first('usuario_email')}}
                    </div>
                    @endif

                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="usuario_password">Contraseña</label>
                    <input type="text" class="form-control {{$errors->has('usuario_password')?"is-invalid":""}} " id="usuario_password" name="usuario_password" value="" placeholder="Ingresa tu contraseña">
                    @if ($errors->has('usuario_password'))
                    <div class="invalid-feedback">
                            {{$errors->first('usuario_password')}}
                    </div>
                    @endif
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