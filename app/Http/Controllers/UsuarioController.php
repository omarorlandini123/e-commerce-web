<?php

namespace App\Http\Controllers;

use App\Documento;
use App\Error;
use App\Freeler;
use App\Respuesta;
use App\Token;
use App\TokenUsuario;
use App\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function registro(Request $request, $token)
    {

        $rpta = new Respuesta;

        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            $contenidoError = Error::getError(5);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $token_var = Token::where('token', $token)->first();

        $documentoExiste = Documento::where('documento_numero', $request->input('dni'))->first();
        if ($documentoExiste != null || count($documentoExiste) != 0) {
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
            $token_usuario_reg->token_usuario_fecha_upd = Carbon::now();
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

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }
        return Usuario::all();
    }

    public function getUsuario(Request $request, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
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
        $token = null;
        if ($request->session()->has('producto_token')) {
            $token = $request->session()->get('producto_token');
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

        if ($request->input('usuario_password')!=$request->input('usuario_password_rep')) {
            $data = array(
                'usuario_password_rep' => 'Las contraseñas no coinciden',
            );
            return redirect()->back()->withInput()->withErrors($data);
        }
        return view();
    }

}
