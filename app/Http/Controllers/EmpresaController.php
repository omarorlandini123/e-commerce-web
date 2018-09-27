<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UsuarioController;
use App\Usuario;
use App\Token;
use App\Error;
use App\TokenUsuario;
use App\Documento;
use App\Empresa;

class EmpresaController extends Controller
{
    public function eliminar(Request $request, $idEmpresa, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $empresaFind = Empresa::where('empresa_id', $idEmpresa)->first();

        if ($empresaFind == null) {
            return Error::getError(11);
        }

        $empresaFind->activo = 0;
        $empresaFind->save();

        $token_usuario_rpta = new TokenUsuario;
        $token_usuario_rpta->eliminado = true;
        return $token_usuario_rpta;
    }

    public function obtener(Request $request, $idEmpresa, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $empresa = Empresa::where([['empresa_id', $idEmpresa], ['activo', 1]])->first();
        if ($empresa == null) {
            return Error::getError(11);
        }
        return $empresa;
    }

    public function listar(Request $request, $token,$condicion)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $usuarioController = new UsuarioController;
        $usuariofind = $usuarioController->getUsuario($request, $token);
        if ($usuariofind == null) {
            return Error::getError(9);
        }
        if($condicion==null || $condicion==""){
            return Empresa::where([['usuario_id', $usuariofind->usuario_id], ['activo', 1]])->get();    
        }
        return Empresa::where([['usuario_id', $usuariofind->usuario_id], ['activo', 1],['empresa_nombre','like','%'.$condicion.'%']])->get();

    }

    public function actualizar(Request $request, $idEmpresa, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $empresaFind = Empresa::where('empresa_id', $idEmpresa)->first();

        if ($empresaFind == null) {
            return Error::getError(11);
        }

        $empresaFind->empresa_nombre = $request->input('nombre');
        $empresaFind->empresa_detalle = $request->input('detalle');
        $empresaFind->empresa_RUC = $request->input('ruc');
        $empresaFind->save();


        $token_usuario_rpta = new TokenUsuario;
        $token_usuario_rpta->actualizado = true;
        return $token_usuario_rpta;

    }

    public function registrar(Request $request, $token)
    {

        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $usuarioController = new UsuarioController;
        $usuariofind = $usuarioController->getUsuario($request, $token);

        if ($usuariofind == null) {
            return Error::getError(9);
        }

        if (!$request->has('ruc')) {
            return Error::getError(12);
        }

        $empresaFind = Empresa::where('empresa_RUC', $request->input('ruc'))->get();
        if ($empresaFind != null && count( $empresaFind)>0) {
            return Error::getError(13);
        }

        $empresa_reg = new Empresa;
        $empresa_reg->empresa_nombre = $request->input('nombre');
        $empresa_reg->empresa_detalle = $request->input('detalle');
        $empresa_reg->empresa_RUC = $request->input('ruc');
        $empresa_reg->empresa_tipo = 3;
        $empresa_reg->activo = 1;
        $empresa_reg->usuario_id = $usuariofind->usuario_id;
        $empresa_reg->save();

        if ($empresa_reg->empresa_id > 0) {
            $token_usuario_rpta = new TokenUsuario;
            $token_usuario_rpta->registrado = true;
            return $token_usuario_rpta;
        }

        return Error::getError(10);

    }
}
