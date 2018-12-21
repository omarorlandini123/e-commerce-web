<?php

namespace App\Http\Controllers;

use App\ColaSMS;
use App\Error;
use App\Freeler;
use App\Respuesta;
use App\Token;
use App\TokenUsuario;
use App\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function logout(Request $request)
    {
        $request->session()->flush();
        return back()->withInput();
    }

    public function tokensnumero(Request $request, $numero)
    {
        return Token::where('token_numero', $numero)->orderBy('token_fecha_creacion', 'desc')->get();
    }

    public function codigoCelular(Request $request, $numero)
    {
        $token = Token::where('token_numero', $numero)->orderBy('token_fecha_creacion', 'desc')->get()->first();
        return "El codigo de seguridad telefónico es: " . $token->token_codigo_sms . " y el token es: " . $token->token;
    }

    public function solicitaCodigo(Request $request, $numero)
    {
        $rpta = new Respuesta;
        if ($numero == null || trim($numero) == "") {
            $contenidoError = Error::getError(1);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $token_var = new Token;
        $token_var->token_numero = $numero;
        $token_var->token_codigo_sms = "" . intval("" . rand(1, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9) . rand(0, 9));
        $token_var->token = md5(uniqid(rand(), true));
        $token_var->token_fecha_creacion = Carbon::now();
        $token_var->save();

        $cola_sms = new ColaSMS;
        $cola_sms->destino = $numero;
        $cola_sms->contenido = "Bienvenido a Freeler. Codigo SMS: " . $token_var->token_codigo_sms;
        $cola_sms->estado = 0;
        $cola_sms->save();

        if ($token_var->token_id > 0) {
            $token_rpta = new Token;
            $token_rpta->token_codigo_sms = true;

            $rpta->tieneError = false;
            $rpta->objeto = $token_rpta;
            return $rpta;

        }

        $contenidoError = Error::getError(2);
        $rpta->tieneError = true;
        $rpta->error = $contenidoError;
        return $rpta;

    }

    public function necesitaRegistro(Request $request, $token)
    {

        $rpta = new Respuesta;

        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            $contenidoError = Error::getError(5);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $token_encontrado = Token::where('token', $token)->orderBy('token_fecha_creacion', 'desc')->first();

        if ($token_encontrado == null) {
            $contenidoError = Error::getError(4);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $numero = $token_encontrado->token_numero;

        $tokens = Token::where([['token_numero', $numero], ['token', '<>', $token]])->get();

        $tieneUsuarioAsociado = false;
        foreach ($tokens as $tokenvar) {
            $tokenusers = TokenUsuario::where('token_token_id', $tokenvar->token_id)->get();

            foreach ($tokenusers as $tokenuser) {
                $usuarioTok = Usuario::where('usuario_id', $tokenuser->usuario_usuario_id)->first();
                if ($usuarioTok != null) {
                    $freeler_exists = Freeler::where('usuario_id', $usuarioTok->usuario_id)->first();
                    if (count($freeler_exists) != null) {
                        $tieneUsuarioAsociado = true;
                        $tokenuser->token_token_id = $token_var->token_id;
                        $tokenuser->save();
                        break;
                    }
                }

            }
        }

        $token_rpta = new Token;
        $token_rpta->necesitaRegistro = !$tieneUsuarioAsociado;

        $rpta->objeto = $token_rpta;
        $rpta->tieneError = false;
        return $rpta;
    }

    public function solicitaRegistro(Request $request, $numero, $codigo)
    {

        $rpta = new Respuesta;

        if ($codigo == null || $numero == null || $codigo == "" || $numero == "") {
            $contenidoError = Error::getError(3);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $token_encontrado = Token::where([['token_codigo_sms', '=', $codigo], ['token_numero', '=', $numero]])->orderBy('token_fecha_creacion', 'desc')->take(1)->get();

        if ($token_encontrado == null || count($token_encontrado) == 0 || $token_encontrado[0] == null) {
            $contenidoError = Error::getError(4);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        if ($token_encontrado[0]->token_id > 0) {
            $token_encontrado[0]->csrf = csrf_token();
            $rpta->objeto = $token_encontrado[0];
            $rpta->tieneError = false;
            return $rpta;
        }
        $token_encontrado->csrf = csrf_token();
        return $token_encontrado;

    }

    public function getSMSPendiente()
    {
        $colas = ColaSMS::where('estado', 0)->get();
        return $colas;
    }

    public function updateState($idCola)
    {
        $cola = ColaSMS::where('cola_sms_id', $idCola)->first();
        if ($cola != null) {
            $cola->estado = 1;
            $cola->save();
        }
    }
}
