<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Token;
use App\Error;
use App\TokenUsuario;
use App\Documento;
use App\Almacen;
use App\ItemAlmacen;

class ItemAlmacenController extends Controller
{
    public function eliminar(Request $request, $idItemAlmacen, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $itemFound = ItemAlmacen::where('item_almacen_id', $idItemAlmacen)->first();

        if ($itemFound == null) {
            return Error::getError(18);
        }

        $itemFound->activo = 0;
        $itemFound->save();

        $token_usuario_rpta = new TokenUsuario;
        $token_usuario_rpta->eliminado = true;
        return $token_usuario_rpta;
    }

    public function obtener(Request $request, $idItemAlmacen, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $itemAlmacenFind = ItemAlmacen::where([['item_almacen_id', $idItemAlmacen], ['activo', 1]])->first();
        if ($itemAlmacenFind == null) {
            return Error::getError(18);
        }
        return $itemAlmacenFind;
    }

    public function listar(Request $request, $token, $condicion)
    {
        // $token_var = Token::where('token', $token)->first();

        // if ($token_var == null || count($token_var) == 0) {
        //     return Error::getError(5);
        // }

        // $usuarioController = new UsuarioController;
        // $usuariofind = $usuarioController->getUsuario($request, $token);
        // if ($usuariofind == null) {
        //     return Error::getError(9);
        // }
        // if ($condicion == null || $condicion == "_") {
        //     $almacenes = Almacen::whereHas('empresa', function ($a) {
        //         $a->whereHas('usuario', function ($b) {
        //             $b->where('usuario_id', $usuariofind->usuario_id);
        //         });
        //     })->where('activo', '=', '1')->orderBy('almacen_nombre')->get();

        //     return $almacenes;
        // }
        // $almacenes = Almacen::whereHas('empresa', function ($a) {
        //     $a->whereHas('usuario', function ($b) {
        //         $b->where('usuario_id', $usuariofind->usuario_id);
        //     });
        // })->where([['activo', '=', '1'],['almacen_nombre', 'like', '%' . $condicion . '%']])->orderBy('almacen_nombre')->get();

        // return $almacenes;
        
    }

    public function actualizar(Request $request, $idAlmacen, $token)
    {
        // $token_var = Token::where('token', $token)->first();

        // if ($token_var == null || count($token_var) == 0) {
        //     return Error::getError(5);
        // }

        // $almacenFind = Almacen::where('almacen_id', $idAlmacen)->first();
        // if ($almacenFind == null) {
        //     return Error::getError(15);
        // }

        // $almacenFind->almacen_nombre = $request->input('nombre');
        // $almacenFind->empresa_detalle = $request->input('detalle');        
        // $almacenFind->save();


        // $token_usuario_rpta = new TokenUsuario;
        // $token_usuario_rpta->actualizado = true;
        // return $token_usuario_rpta;

    }

    public function registrar(Request $request, $token)
    {

        // $token_var = Token::where('token', $token)->first();

        // if ($token_var == null || count($token_var) == 0) {
        //     return Error::getError(5);
        // }

        // $usuarioController = new UsuarioController;
        // $usuariofind = $usuarioController->getUsuario($request, $token);

        // if ($usuariofind == null) {
        //     return Error::getError(9);
        // }

        // if (!$request->has('empresa_id')) {
        //     return Error::getError(16);
        // }

        // $empresaFind = Empresa::where('empresa_id', $request->input('empresa_id'))->get();
        // if ($empresaFind == null && count($empresaFind) == 0) {
        //     return Error::getError(11);
        // }

        // $almacen_reg = new Almacen;
        // $almacen_reg->almacen_nombre = $request->input('nombre');
        // $almacen_reg->almacen_detalle = $request->input('detalle');
        // $almacen_reg->is_almacen_app = 0;
        // $almacen_reg->empresa_id = $empresaFind->empresa_id;
        // $almacen_reg->activo = 1;
        // $almacen_reg->save();

        // if ($almacen_reg->almacen_id > 0) {
        //     $token_usuario_rpta = new TokenUsuario;
        //     $token_usuario_rpta->registrado = true;
        //     return $token_usuario_rpta;
        // }

        // return Error::getError(17);

    }
}
