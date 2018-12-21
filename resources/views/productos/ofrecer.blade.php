@extends('principal.index')
@section('contenido')

<div class="col-sm-12 align-self-center">
    @if ($rpta->tieneError)
    <h3>{{$rpta->error}}</h3>
    @else
    @if ($comprador!=null)
    <h3><strong>Hola, </strong> {{$comprador->usuario->usuario_nombre}}</h3> <br>
    <h4><strong>Confirma tu pedido de: </strong> {{$rpta->objeto->producto_nombre}}</h4>
    @else
    <center>
        <h3>Pide tu: {{$rpta->objeto->producto_nombre}}</h3>
    </center>
    @endif


    <br>
    <form action="{{route('producto.validarUsuario',array('idProducto'=>$rpta->objeto->producto_id, 'token'=>$token))}}"
        method="post">
        @csrf
        <div class="row">
            @if ($comprador==null)
            <div class="col-sm-12">
                <ul class="nav nav-tabs justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="javascript">Ingresa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Regístrate</a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="formGroupExampleInput">Nombre</label>
                    <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" value="" placeholder="Ingresa Tu Nombre">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="formGroupExampleInput">Apellido Paterno</label>
                    <input type="text" class="form-control" id="txt_ape_pa" name="txt_ape_pa" value="" placeholder="Ingresa tu primer apellido">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="formGroupExampleInput">Apellido Materno</label>
                    <input type="text" class="form-control" id="txt_ape_ma" name="txt_ape_ma" value="" placeholder="Ingresa tu segundo apellido">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="formGroupExampleInput">Correo</label>
                    <input type="text" class="form-control" id="txt_correo" name="txt_correo" value="" placeholder="Ingresa tu correo">
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <label for="formGroupExampleInput">Contraseña</label>
                    <input type="text" class="form-control" id="txt_password" name="txt_password" value="" placeholder="Ingresa una contraseña">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="formGroupExampleInput">Confirma la contraseña</label>
                    <input type="text" class="form-control" id="txt_password_conf" name="txt_password_conf" value=""
                        placeholder="Confirma la contraseña">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="formGroupExampleInput">DNI</label>
                    <input type="text" class="form-control" id="txt_dni" name="txt_dni" value="" placeholder="Ingresa tu DNI">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="formGroupExampleInput">Direccion referencial</label>
                    <input type="text" class="form-control" id="txt_direccion" name="txt_direccion" value=""
                        placeholder="Ingresa tu direccion referencial">
                </div>
            </div>



            @endif

            <hr>
            <div class="col-sm-12">
                <div class="form-group">
                    <label for="formGroupExampleInput">Confirma la cantidad</label>
                    <input type="text" class="form-control" id="txt_cantidad" name="txt_cantidad" value="{{empty($cantidad)?"0":$cantidad}}"
                        placeholder="¿Cuántos quieres?">
                </div>
                <div class="form-group">
                    <label for="txt_envio">Confirma la direccion de envío</label>
                    <input type="text" class="form-control" id="txt_envio" name="txt_envio" value="{{empty($direccion)?"":$direccion}}"
                        placeholder="¿Dónde lo quieres?">
                </div>
            </div>


            <div class="col-sm-12">
                <div class="form-group">
                    <center><input type="submit" class="btn btn-success" value="Pedir" /></center>
                </div>
            </div>

            <br>
        </div>
    </form>
    @endif



</div>



@stop