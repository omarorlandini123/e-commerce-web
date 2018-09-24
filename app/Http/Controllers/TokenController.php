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
            return Error::getError(1);
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

        return Error::getError(2);
        
    }

    public function necesitaRegistro(Request $request, $token){
        $token_encontrado = Token::where('token', $token)->orderBy('token_fecha_creacion','desc')->first();
        
        if($token_encontrado==null ||  count($token_encontrado)==0 || $token_encontrado[0]==null){           
            return Error::getError(4);
        }

        $numero=$token_encontrado->token_numero;

        $tokens=Token::where([['token_numero',$numero],['token','<>',$token]])->get();

        $tieneUsuarioAsociado=false;
        foreach ($tokens as $token) {
            $tokenusers = TokenUsuario::where('token_token_id',$token->token_id)->get();
            foreach($tokenusers as $tokenuser){
                $usuarioTok = Usuario::where('usuario_id',$tokenuser->usuario_usuario_id)->get();
                if(count( $usuarioTok)>0){
                    $tieneUsuarioAsociado=true;
                    break;
                }
            }
        }
        
        $token_rpta = new Token;
        $token_rpta->necesitaRegistro=!$tieneUsuarioAsociado;
        return $token_rpta; 
        
    }

    public function solicitaRegistro(Request $request, $numero,$codigo){
       
        if($codigo==null|| $numero==null || $codigo==""|| $numero==""){            
            return Error::getError(3);
        }

        $token_encontrado = Token::where([['token_codigo_sms', '=', $codigo],['token_numero', '=', $numero]])->orderBy('token_fecha_creacion','desc')->take(1)->get();
        
        
        if($token_encontrado==null ||  count($token_encontrado)==0 || $token_encontrado[0]==null){           
            return Error::getError(4);
        }

        if($token_encontrado[0]->token_id>0){
            $token_encontrado[0]->csrf = csrf_token();
            return $token_encontrado[0];
        }
        $token_encontrado->csrf = csrf_token();
        return $token_encontrado;

    }
}
