<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

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

        session(['usuario_id' => $usuariofind->usuario_id]);

        if ($condicion == null || $condicion == "_") {
            return ItemAlmacen::whereHas('almacen', function ($q) { 
                $q->whereHas('empresa', function ($a) {
                    $a->whereHas('usuario_empresa', function ($b) {
                        $b->where('usuario_id', session('usuario_id'));
                    });
                });
            })->where('activo', 1)->get();
        }else{
            return ItemAlmacen::whereHas('almacen', function ($q) {
                $q->whereHas('empresa', function ($a) {
                    $a->whereHas('usuario_empresa', function ($b) {
                        $b->where('usuario_id', session('usuario_id'));
                    });
                });
            })->where([['activo', 1], ['item_almacen_titulo', 'like', '%' . $condicion . '%']])->get();
        }

    }

    public function actualizar(Request $request, $idItemAlmacen, $token)
    {

        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $itemAlmacenFind = ItemAlmacen::where([['item_almacen_id', $idItemAlmacen], ['activo', 1]])->first();
        if ($itemAlmacenFind == null) {
            return Error::getError(18);
        }

        $itemAlmacenFind->item_almacen_titulo = $request->input('titulo');
        $itemAlmacenFind->item_almacen_descripcion = $request->input('descripcion');
        $itemAlmacenFind->item_almacen_cantidad = $request->input('cantidad');
        $itemAlmacenFind->save();


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

        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $tokenUsuarioFound = TokenUsuario::where('token_token_id', $token_var->token_id)->first();
        if ($tokenUsuarioFound == null) {
            return Error::getError(9);
        }

        $usuariofind = Usuario::where('usuario_id', $tokenUsuarioFound->usuario_id)->first();
        if ($usuariofind == null) {
            return Error::getError(9);
        }

        if (!$request->has('almacen_id')) {
            return Error::getError(20);
        }

        $almacenFind = Almacen::where([
            ['almacen_id', $request->input('almacen_id')],
            ['activo', 1],
        ])->first();

        if ($almacenFind == null) {
            return Error::getError(15);
        }

        $empresaFind = Empresa::where([
            ['empresa_id', $almacenFind->empresa_id],
            ['activo', 1],
        ])->first();

        if ($empresaFind == null) {
            return Error::getError(11);
        }

        $usuarioEmpresaFind = UsuarioEmpresa::where([
            ['empresa_id', $empresaFind->empresa_id],
            ['usuario_id', $usuariofind->usuario_id],
            ['is_empresa_propia', 1],
        ])->first();

        if ($empresaFind == null) {
            return Error::getError(21);
        }

        $itemAlmacen = new ItemAlmacen;
        $itemAlmacen->item_almacen_titulo= $request->input('titulo');
        $itemAlmacen->item_almacen_descripcion= $request->input('descripcion');
        $itemAlmacen->item_almacen_cantidad= $request->input('cantidad');
        $itemAlmacen->almacen_id=  $almacenFind->almacen_id;
        $itemAlmacen->activo= 1;
        $itemAlmacen->save();

        if ($itemAlmacen->almacen_id > 0) {
            $token_usuario_rpta = new TokenUsuario;
            $token_usuario_rpta->registrado = true;
            return $token_usuario_rpta;
        }

        return Error::getError(22);

    }
}
