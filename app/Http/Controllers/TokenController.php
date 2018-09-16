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
        $token_var->token_codigo_sms = intval( "".rand(1,9)  . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );        
        $token_var->token = md5(uniqid(rand(), true)) ;
        $token_var->token_fecha_creacion = Carbon::now();
        $token_var->save();

        if($token_var->token_id>0){
            $token_rpta = new Token;
            $token_rpta->token_codigo_sms=true;
            return $token_rpta;
        }

        $error = new Error;
        $error->codigo = "E_0002";
        $error->descripcion = "No se ha podido generar el código";
        return $error;
    }

    public function solicitaRegistro(Request $request, $codigo){
        $error = new Error;
        if($codigo==null){            
            $error->codigo = "E_0003";
            $error->descripcion = "El codigo a validar está vacío";            
            return $error;
        }

        //$sql=Token::where('token_codigo_sms', '=', $codigo)->orderBy('token_fecha_creacion','desc')->take(1)->toSql();
        //return $sql;

        $token_encontrado = Token::where('token_codigo_sms', '=', $codigo)->orderBy('token_fecha_creacion','desc')->take(1)->get();
        if($token_encontrado==null || count($token_encontrado)==0 || $token_encontrado[0]==null){           
            $error->codigo = "E_0004";
            $error->descripcion = "El codigo no se ha encontrado";            
            return $error;
        }

        if($token_encontrado[0]->token_id>0){
            return $token_encontrado[0];
        }

        return $token_encontrado;

    }
}
