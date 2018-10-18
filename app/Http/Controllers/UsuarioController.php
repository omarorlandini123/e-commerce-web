<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\TokenController;
use Carbon\Carbon;
use App\Almacen;
use App\Documento;
use App\Empresa;
use App\Error;
use App\ItemAlmacen;
use App\Producto;
use App\Token;
use App\TokenUsuario;
use App\User;
use App\Usuario;
use App\UsuarioEmpresa;

class UsuarioController extends Controller
{
    public function registro(Request $request, $token){

        $token_var=Token::where('token',$token)->first();

        if($token_var==null || count($token_var)==0){
            return Error::getError(5);
        }

        $token_var=Token::where('token',$token)->first();


        $documentoExiste=Documento::where('documento_numero',$request->input('dni'))->first();
        if($documentoExiste!=null || count($documentoExiste)!=0){
            return Error::getError(8);
        }
     
        $usuario_reg = new Usuario;
        $usuario_reg->usuario_nombre= $request->input('nombre');
        $usuario_reg->usuario_apellidoPa= $request->input('apellido_pa');
        $usuario_reg->usuario_apellidoMa= $request->input('apellido_ma');
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

                $dni_reg = new Documento;
                $dni_reg->documento_numero = $request->input('dni');
                $dni_reg->documento_tipo = 0;
                $dni_reg->documento_defecto = 1;
                $dni_reg->usuario_id= $usuario_reg->usuario_id;
                $dni_reg->save();

                if($dni_reg->documento_id>0){
                    $freeler = new Freeler;                    
                    $freeler->usuario_id=$usuario_reg->usuario_id;
                    $freeler->codigo_ref= $request->input('codigo_ref');    
                    $freeler->save();
                    if($freeler->freeler_id>0){
                        $token_usuario_rpta = new TokenUsuario;
                        $token_usuario_rpta->registrado = true;
                        return $token_usuario_rpta;
                    }
                    
                }else{
                    return Error::getError(7);
                }

            }else{
                return Error::getError(7);
            }
        }else{
            return Error::getError(7);
        }
    }

    public function listarUsuarios(Request $request,$token){  
        $token_var=Token::where('token',$token)->first();

        if($token_var==null || count($token_var)==0){
            return Error::getError(5);
        }    
        return Usuario::all();
    }

    public function getUsuario(Request $request, $token){
        $token_var=Token::where('token',$token)->first();

        if($token_var==null || count($token_var)==0){
            return Error::getError(5);
        }
    
        $token_var=Token::where('token',$token)->first();
        if($token_var!=null){
            $tokenuser=TokenUsuario::where('token_token_id',$token_var->token_id)->first();
            if($tokenuser!=null){
                $usuario = Usuario::where('usuario_id',$tokenuser->usuario_usuario_id)->first();
                if($usuario!=null){
                    return $usuario;
                }
            }
        }

        return null;

    }


}
