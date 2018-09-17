<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Token;
use App\Error;
use App\TipoError;
class TokenController extends Controller
{
    public function solicitaCodigo(Request $request, $numero){
        //$name = $request->input('name');
        if($numero == null){
            return Error::getError(TipoError::E_0001);
        }

        $token_var = new Token;
        $token_var->token_numero = $numero;
        $token_var->token_codigo_sms = "".intval( "".rand(1,9)  . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );        
        $token_var->token = md5(uniqid(rand(), true)) ;
        $token_var->token_fecha_creacion = Carbon::now();
        $token_var->save();
        
        if($token_var->token_id>0){
            $token_rpta = new Token;
            $token_rpta->token_codigo_sms=true;
            return $token_rpta;
        }

        return Error::getError(TipoError::E_0002);
        
    }

    public function solicitaRegistro(Request $request, $numero,$codigo){
       
        if($codigo==null|| $numero==null || $codigo==""|| $numero==""){            
            return Error::getError(TipoError::E_0003);
        }


        $token_encontrado = Token::where([['token_codigo_sms', '=', $codigo],['token_numero', '=', $numero]])->orderBy('token_fecha_creacion','desc')->take(1)->get();
        $cantidad=$token_encontrado->count();
        var_dump($cantidad);
        if($token_encontrado==null || $cantidad == 0 || count($token_encontrado)==0 || $token_encontrado[0]==null){           
            return new Error("E_0004","El codigo no se ha encontrado");
        }

        if($token_encontrado[0]->token_id>0){
            return $token_encontrado[0];
        }

        return $token_encontrado;

    }
}
