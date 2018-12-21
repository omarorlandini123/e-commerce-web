@extends('principal.index')
@section('contenido')

<div class="col-sm-12 align-self-center">

    <form action="{{route('usuario.crear.comprador')}}" method="post">
        @csrf
        <div class="row">

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="usuario_nombre">Nombre</label>
                    <input type="text" class="form-control {{$errors->has('usuario_nombre')?"is-invalid":""}}" id="usuario_nombre"
                        name="usuario_nombre" placeholder="Ingresa tu nombre" required>
                    @if ($errors->has('usuario_nombre'))
                    <div class="invalid-feedback">
                        {{$errors->first('usuario_nombre')}}
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="usuario_apellidoPa">Apellido Paterno</label>
                    <input type="text" class="form-control {{$errors->has('usuario_apellidoPa')?"is-invalid":""}}" id="usuario_apellidoPa"
                        name="usuario_apellidoPa" placeholder="Ingresa tu apellido" required>
                    @if ($errors->has('usuario_apellidoPa'))
                    <div class="invalid-feedback">
                        {{$errors->first('usuario_apellidoPa')}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="usuario_apellidoMa">Apellido Materno</label>
                    <input type="text" class="form-control {{$errors->has('usuario_apellidoMa')?"is-invalid":""}}" id="usuario_apellidoMa"
                        name="usuario_apellidoMa" placeholder="Ingresa tu apellido" required>
                    @if ($errors->has('usuario_apellidoMa'))
                    <div class="invalid-feedback">
                        {{$errors->first('usuario_apellidoMa')}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-sm-12">
                
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control {{$errors->has('direccion')?"is-invalid":""}}" id="direccion"
                        name="direccion" placeholder="Ingresa tu direccion referencial">
                    @if ($errors->has('direccion'))
                    <div class="invalid-feedback">
                        {{$errors->first('direccion')}}
                    </div>
                    @else
                    <div class="valid-feedback">
                        Esta direccion es referencial para entregar tus productos
                    </div>
                    @endif
                
            </div>
            <hr>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="usuario_email">Email</label>
                    <input type="text" class="form-control {{$errors->has('usuario_email')?"is-invalid":""}}" id="usuario_email"
                        name="usuario_email" placeholder="Ingresa tu correo" required>
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
                    <input type="password" class="form-control {{$errors->has('usuario_password')?"is-invalid":""}}" id="usuario_password"
                        name="usuario_password" placeholder="Ingresa una contraseña" required>
                    @if ($errors->has('usuario_password'))
                    <div class="invalid-feedback">
                        {{$errors->first('usuario_password')}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="usuario_password_rep">Contraseña</label>
                    <input type="password" class="form-control {{$errors->has('usuario_password_rep')?"is-invalid":""}}"
                        id="usuario_password_rep" name="usuario_password_rep" placeholder="confirma la contraseña"
                        required>
                    @if ($errors->has('usuario_password_rep'))
                    <div class="invalid-feedback">
                        {{$errors->first('usuario_password_rep')}}
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <center><input type="submit" class="btn btn-success" value="Registrarme" /></center>
                </div>
            </div>

            <br>
        </div>
    </form>
  



</div>



@stop