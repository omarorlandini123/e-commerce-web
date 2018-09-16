<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Token;
use App\Error;
class TokenController extends Controller
{
    public function solicitaCodigo(Request $request, $numero){
        //$name = $request->input('name');
        if($numero == null){
            $error = new Error;
            $error->codigo = "E_0001";
            $error->descripcion = "El numero a enviar está vacío";
            return $error;
        }

        $token_var = new Token;
        $token_var->token_numero = $numero;
        $token_var->token_codigo_sms = '123456';        
        $token_var->token = md5(uniqid(rand(), true))        ;
        $token_var->token_fecha_creacion = Carbon::now();
        $token_var->save();

        if($token_var->token_id>0){
            $token_rpta = new Token;
            $token_rpta->token_codigo_sms=true;
            return $token_rpta;
        }
        return null;
    }
}
