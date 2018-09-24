<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Token;
use App\TokenUsuario;

class UsuarioController extends Controller
{
    public function login($token){
        return Usuario::all();
    }

    public function registro(Request $request, $token){
        $token_var=Token::where('token',$token)->first();
        if($token_var==null || count($token_var)==0){
            return Error::getError(5);
        }

        // $validatedData = $request->validate([
        //     'nombre' => 'required|max:250',
        //     'apellido_pa' => 'required|max:250',
        //     'apellido_ma' => 'required|max:250',
        //     'email' => 'required|max:250',
        //     'codigo_ref' => 'integer',
        // ]);

        // if(count($validatedData->errors())>0){
        //     return Error::getError(6);
        // }

        $usuario_reg = new Usuario;
        $usuario_reg->usuario_nombre= $request->input('nombre');
        $usuario_reg->usuario_apelidoPa= $request->input('apellido_pa');
        $usuario_reg->usuario_apelidoMa= $request->input('apellido_ma');
        $usuario_reg->usuario_email= $request->input('email');
        $usuario_reg->usuario_codigoref= $request->input('codigo_ref');    
        $usuario_reg->save();

        if($usuario_reg->usuario_id>0){
            $token_usuario_reg = new TokenUsuario;
            $token_usuario_reg->token_token_id=$token_var->token_id;
            $token_usuario_reg->usuario_usuario_id=$usuario_reg->usuario_id;
            $token_usuario_reg->token_usuario_fecha_upd=  Carbon::now();
            $token_usuario_reg->token_usuario_activo=1;
            $token_usuario_reg->save();
            
            if($token_usuario_reg->token_usuario_id>0){
                $token_usuario_rpta = new TokenUsuario;
                $token_usuario_rpta->registrado = true;
                return $token_usuario_rpta;
            }else{
                return Error::getError(7);
            }

        }else{
            return Error::getError(7);
        }
    }

}
