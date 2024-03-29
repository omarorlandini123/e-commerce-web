<?php

namespace App\Http\Controllers;

use App\Documento;
use App\Error;
use App\Freeler;
use App\Respuesta;
use App\Token;
use App\Administrador;
use App\TokenUsuario;
use App\Usuario;
use App\Almacen;
use App\Comprador;
use App\Empresa;
use App\ItemAlmacen;
use App\Producto;
use App\ProductoDetalle;
use App\Pedido;
use App\PedidoDetalle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function registro(Request $request, $token)
    {

        $rpta = new Respuesta;

        $token_var = Token::where('token', $token)->first();

        if ($token_var == null) {
            $contenidoError = Error::getError(5);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $token_var = Token::where('token', $token)->first();

        $documentoExiste = Documento::where('documento_numero', $request->input('dni'))->first();
        if ($documentoExiste != null) {
            $contenidoError = Error::getError(8);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $usuario_reg = new Usuario;
        $usuario_reg->usuario_nombre = $request->input('nombre');
        $usuario_reg->usuario_apellidoPa = $request->input('apellido_pa');
        $usuario_reg->usuario_apellidoMa = $request->input('apellido_ma');
        $usuario_reg->usuario_email = $request->input('email');
        $usuario_reg->usuario_codigoref = $request->input('codigo_ref');
        $usuario_reg->save();

        if ($usuario_reg->usuario_id > 0) {
            $token_usuario_reg = new TokenUsuario;
            $token_usuario_reg->token_token_id = $token_var->token_id;
            $token_usuario_reg->usuario_usuario_id = $usuario_reg->usuario_id;
            $token_usuario_reg->token_usuario_fecha_upd = Carbon::now()->subHours(5);
            $token_usuario_reg->token_usuario_activo = 1;
            $token_usuario_reg->save();

            if ($token_usuario_reg->token_usuario_id > 0) {

                $dni_reg = new Documento;
                $dni_reg->documento_numero = $request->input('dni');
                $dni_reg->documento_tipo = 0;
                $dni_reg->documento_defecto = 1;
                $dni_reg->usuario_id = $usuario_reg->usuario_id;
                $dni_reg->save();

                if ($dni_reg->documento_id > 0) {
                    $freeler = new Freeler;
                    $freeler->usuario_id = $usuario_reg->usuario_id;
                    $freeler->codigo_ref = $request->input('codigo_ref');
                    $freeler->save();
                    if ($freeler->freeler_id > 0) {

                        $token_rpta = new Token;
                        $token_rpta->registrado = true;

                        $rpta->tieneError = false;
                        $rpta->objeto = $token_rpta;
                        return $rpta;

                    }

                } else {
                    $contenidoError = Error::getError(7);
                    $rpta->tieneError = true;
                    $rpta->error = $contenidoError;
                    return $rpta;
                }

            } else {
                $contenidoError = Error::getError(7);
                $rpta->tieneError = true;
                $rpta->error = $contenidoError;
                return $rpta;
            }
        } else {
            $contenidoError = Error::getError(7);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }
    }

    public function listarUsuarios(Request $request, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null) {
            return Error::getError(5);
        }
        return Usuario::all();
    }

    public function getUsuario(Request $request, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null) {
            return Error::getError(5);
        }

        $token_var = Token::where('token', $token)->first();
        if ($token_var != null) {
            $tokenuser = TokenUsuario::where('token_token_id', $token_var->token_id)->first();
            if ($tokenuser != null) {
                $usuario = Usuario::where('usuario_id', $tokenuser->usuario_usuario_id)->first();
                if ($usuario != null) {
                    return $usuario;
                }
            }
        }

        return null;

    }

    public function login(Request $request)
    {
        return view('usuario.login');
    }

    public function validar(Request $request)
    {

        $request->validate([
            'usuario_email' => 'required|exists:usuario|max:255',
            'usuario_password' => 'required|max:255',
        ], [
            'usuario_email.required' => 'Escribe tu correo',
            'usuario_email.exists' => 'Este correo no existe',
            'usuario_password.required' => 'Escribe tu contraseña',

        ]);

        $correo = $request->input('usuario_email');
        $password = $request->input('usuario_password');

        $usuario = Usuario::where([['usuario_email', $correo], ['usuario_password', $password]])->first();

        if ($usuario == null) {
            $data = array(
                'usuario_password' => 'Tu contraseña no es correcta',
            );
            return view('usuario.login')->withErrors($data);
        }

        $idProducto = null;
        if ($request->session()->has('producto_id')) {
            $idProducto = $request->session()->get('producto_id');
        }

        $idAfiche = null;
        if ($request->session()->has('afiche_id')) {
            $idAfiche = $request->session()->get('afiche_id');
        }

        $token = null;
        if ($request->session()->has('producto_token')) {
            $token = $request->session()->get('producto_token');
        }

        $administrador = Administrador::where('usuario_id',  $usuario->usuario_id)->first();

        if($administrador!=null){
            $request->session()->put('administrador_id', $administrador->administrador_id);
            return redirect()->route('administrador.empresas');
        }
              
        $comprador = Comprador::where('usuario_id',  $usuario->usuario_id)->first();
       
        if($comprador!=null){
            $request->session()->put('comprador_id', $comprador->comprador_id);
        }else{
            $data = array(
                'exito' =>'eres un freeler, pero no puedes comprar aún. Pronto tendremos novedades :D'
            );
    
            return view('principal.success')->with($data);
        }
        
        if ($idAfiche != null && $token != null) {
            return redirect()->route('afiche.pedir', ['idAfiche' => $idAfiche, 'token' => $token]);
        }

        if ($idProducto != null && $token != null) {
            return redirect()->route('producto.pedir', ['idProducto' => $idProducto, 'token' => $token]);
        }
    }
    public function registrar_comprador(Request $request)
    {

        return view('usuario.registro');
    }
    public function crear_comprador(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'usuario_email' => 'required|unique:usuario|max:255',
                'usuario_password' => 'required|max:255',
                'usuario_password_rep' => 'required|max:255',
                'usuario_nombre' => 'required|max:255',
                'usuario_apellidoPa' => 'required|max:255',
                'usuario_apellidoMa' => 'required|max:255',
                'direccion' => 'required|max:255',
            ], [
                'usuario_email.required' => 'Escribe tu correo',
                'usuario_email.unique' => 'El correo ya está registrado por otra persona',
                'usuario_password.required' => 'Escribe tu contraseña',
                'usuario_password_rep.required' => 'Confirma tu contraseña',
                'usuario_nombre.required' => 'Escribe tu nombre',
                'usuario_apellidoPa.required' => 'Escribe tu apellido',
                'usuario_apellidoMa.required' => 'Escribe tu apellido',
                'direccion.required' => 'Escribe tu dirección',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if ($request->input('usuario_password') != $request->input('usuario_password_rep')) {
            $data = array(
                'usuario_password_rep' => 'Las contraseñas no coinciden',
            );
            return redirect()->back()->withInput()->withErrors($data);
        }

        $usuario = new Usuario;
        $usuario->usuario_nombre = $request->input('usuario_nombre');
        $usuario->usuario_apellidoPa = $request->input('usuario_apellidoPa');
        $usuario->usuario_apellidoMa = $request->input('usuario_apellidoMa');
        $usuario->usuario_email = $request->input('usuario_email');
        $usuario->direccion = $request->input('direccion');
        $usuario->usuario_password = $request->input('usuario_password');
        $usuario->save();

        if ($usuario->usuario_id > 0) {
            $comprador = new Comprador;
            $comprador->usuario_id = $usuario->usuario_id;
            $comprador->save();

            if ($comprador->comprador_id > 0) {
                $request->session()->put('comprador_id', $comprador->comprador_id);
                if ($request->session()->has('producto_id')) {
                    return redirect()->route('producto.pedir', [
                        'idProducto' => $request->session()->get('producto_id'),
                        'token' => $request->session()->get('producto_token'),
                    ]);
                }else{
                    $data = array(
                        'exito' =>'Pronto tendremos más opciones para ti :)'
                    );
            
                    return view('principal.success')->with($data);
                }
            }
        }

        $data = array(
            'error' =>'No te has podido registrar :('
        );

        return view('principal.error')->with($data);

       
    }

}
