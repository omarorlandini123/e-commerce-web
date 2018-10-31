<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpresaController;
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
class AlmacenController extends Controller
{
    public function eliminar(Request $request, $idAlmacen, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $almacenFind = Almacen::where('almacen_id', $$idAlmacen)->first();

        if ($almacenFind == null) {
            return Error::getError(15);
        }

        $almacenFind->activo = 0;
        $almacenFind->save();

        $token_usuario_rpta = new TokenUsuario;
        $token_usuario_rpta->eliminado = true;
        return $token_usuario_rpta;
    }

    public function obtener(Request $request, $idAlmacen, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $almacenFind = Almacen::where([['almacen_id', $idAlmacen], ['activo', 1]])->first();
        if ($almacenFind == null) {
            return Error::getError(15);
        }
        return $almacenFind;
    }

    public function listar(Request $request, $token, $condicion)
    {
      
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $tokenUsuarioFound = TokenUsuario::where('token_token_id', $token_var->token_id)->first();
        if ($tokenUsuarioFound == null) {
            return Error::getError(9);
        }

        $usuariofind = Usuario::where('usuario_id', $tokenUsuarioFound->usuario_usuario_id)->first();
        if ($usuariofind == null) {
            return Error::getError(9);
        }

        if ($condicion == null || $condicion == "_") {
            $almacenes = Almacen::whereHas('empresa', function ($a) {
                $a->whereHas('freeler', function ($b) {
                    $b->where('usuario_id', $usuariofind->usuario_id);
                });
            })->where('activo', '=', '1')->orderBy('almacen_nombre')->get();

            return $almacenes;
        }
        $almacenes = Almacen::whereHas('empresa', function ($a) {
            $a->whereHas('freeler', function ($b) {
                $b->where('usuario_id', $usuariofind->usuario_id);
            });
        })->where([['activo', '=', '1'],['almacen_nombre', 'like', '%' . $condicion . '%']])->orderBy('almacen_nombre')->get();

        return $almacenes;
        
    }

    public function actualizar(Request $request, $idAlmacen, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $almacenFind = Almacen::where('almacen_id', $idAlmacen)->first();
        if ($almacenFind == null) {
            return Error::getError(15);
        }

        $almacenFind->almacen_nombre = $request->input('nombre');
        $almacenFind->empresa_detalle = $request->input('detalle');        
        $almacenFind->save();


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

        if (!$request->has('empresa_id')) {
            return Error::getError(16);
        }

        $empresaFind = Empresa::where('empresa_id', $request->input('empresa_id'))->get();
        if ($empresaFind == null && count($empresaFind) == 0) {
            return Error::getError(11);
        }

        $almacen_reg = new Almacen;
        $almacen_reg->almacen_nombre = $request->input('nombre');
        $almacen_reg->almacen_detalle = $request->input('detalle');
        $almacen_reg->is_almacen_app = 0;
        $almacen_reg->empresa_id = $empresaFind->empresa_id;
        $almacen_reg->activo = 1;
        $almacen_reg->save();

        if ($almacen_reg->almacen_id > 0) {
            $token_usuario_rpta = new TokenUsuario;
            $token_usuario_rpta->registrado = true;
            return $token_usuario_rpta;
        }

        return Error::getError(17);

    }
}
