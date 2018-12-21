@extends('principal.index')
@section('contenido')

<div class="col-sm-12 align-self-center">
   
    <br>
    <form action="{{route('usuario.validar')}}"
        method="post">
        @csrf
        <div class="row">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            
            @endif

            <div class="col-sm-12">
                <div class="form-group">
                    
                    <label for="usuario_email">Correo</label>
                    <input type="text" class="form-control is-invalid" id="usuario_email" name="usuario_email" placeholder="Ingresa tu correo" required>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>

                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="usuario_password">Contraseña</label>
                    <input type="text" class="form-control" id="usuario_password" name="usuario_password" value="" placeholder="Ingresa tu contraseña">
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