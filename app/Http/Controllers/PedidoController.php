<?php

namespace App\Http\Controllers;

use App\Almacen;
use App\Empresa;
use App\Error;
use App\Freeler;
use App\ItemAlmacen;
use App\Producto;
use App\ProductoDetalle;
use App\Respuesta;
use App\Token;
use App\TokenUsuario;
use App\Usuario;
use App\Comprador;
use App\Pedido;
use App\PedidoDetalle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PedidoController extends Controller
{
    public function listar(Request $request, $token){
        $rpta = new Respuesta;

        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            $contenidoError = Error::getError(5);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            $contenidoError = Error::getError(5);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $tokenUsuarioFound = TokenUsuario::where('token_token_id', $token_var->token_id)->first();
        if ($tokenUsuarioFound == null) {
            $contenidoError = Error::getError(9);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $usuariofind = Usuario::where('usuario_id', $tokenUsuarioFound->usuario_usuario_id)->first();
        if ($usuariofind == null) {
            $contenidoError = Error::getError(9);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }
        $this->usuario_id=$usuariofind->usuario_id;

        $pedidos = Pedido::whereHas('detalle_pedido',function($a){
            $a->whereHas('producto',function($b){
                $b->whereHas('empresa',function($c){
                    $c->whereHas('freeler',function($d){
                        $d->where('usuario_id',$this->usuario_id);
                    });
                });
            });
        })->with(['detalle_pedido','detalle_pedido.producto','detalle_pedido.producto.producto_detalle','detalle_pedido.producto.producto_detalle.item_almacen'])->get();

            
        return $pedidos;


    }
}
