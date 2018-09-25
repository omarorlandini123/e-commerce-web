<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UsuarioController;
use App\Usuario;
use App\Token;
use App\TokenUsuario;
use App\Documento;

class EmpresaController extends Controller
{
    public function listar(Request $request, $token){
        $token_var=Token::where('token',$token)->first();

        if($token_var==null || count($token_var)==0){
            return Error::getError(5);
        }
        
        return Empresa::all();

    }

    public function registrar(Request $request, $token){

        $token_var=Token::where('token',$token)->first();

        if($token_var==null || count($token_var)==0){
            return Error::getError(5);
        }
     
        $usuarioController = new UsuarioController;
        $usuariofind=$usuarioController->getUsuario($request,$token);
        
        if($usuariofind==null){
            return Error::getError(9);
        }

        $empresa_reg = new Empresa;
        $empresa_reg->empresa_nombre=$request->input('nombre');
        $empresa_reg->empresa_detalle = $request->input('detalle');
        $empresa_reg->empresa_RUC = $request->input('ruc');
        $empresa_reg->empresa_tipo = 3;
        $empresa_reg->usuario_id=$usuariofind->usuario_id;
        $empresa_reg->save();
               
        if($empresa_reg->empresa_id>0){
            $token_usuario_rpta = new TokenUsuario;
            $token_usuario_rpta->registrado = true;
            return $token_usuario_rpta;
        }

        return Error::getError(10);

    }
}
