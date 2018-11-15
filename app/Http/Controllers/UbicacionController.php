<?php

namespace App\Http\Controllers;

use App\Error;
use App\Respuesta;
use App\Ubicaciones;
use App\Token;
use App\TokenUsuario;
use App\Usuario;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function listarUbicaciones(Request $request, $token)
    {
        $rpta = new Respuesta;

        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            $contenidoError = Error::getError(5);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $tokenUsuarioFound = TokenUsuario::where('token_token_id', $token_var->token_id)->first();
        if ($tokenUsuarioFound == null) {
            $contenidoError = Error::getError(9);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $this->usuariofind = Usuario::where('usuario_id', $tokenUsuarioFound->usuario_usuario_id)->first();
        if ($this->usuariofind == null) {
            $contenidoError = Error::getError(9);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $ubicaciones = Ubicaciones::where('ubicacion','like',"%Lima%")->get();

        $rpta->tieneError = false;
        $rpta->objeto = $ubicaciones;
        return $rpta;


    }

}
