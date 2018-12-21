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

 
        $productos = Producto::whereHas('detalle_pedido',function($a){
            $a->whereHas('pedido',function($b){
                $b->whereHas('freeler',function($c){
                    $c->where('usuario_id',$this->usuario_id);
                });
            });
        })
        ->with(['detalle_pedido','detalle_pedido.pedido','detalle_pedido.producto','producto_detalle','detalle_pedido.pedido.freeler','detalle_pedido.pedido.freeler.usuario'])
        ->get();


        for ($i = 0; $i < count($productos); $i++) {
            $detalles = $productos[$i]->producto_detalle;
            for ($r = 0; $r < count($detalles); $r++) {
                $detalles[$r]->item_almacen = ItemAlmacen::where('item_almacen_id', $detalles[$r]->item_almacen_id)->first();
                $detalles[$r]->item_almacen->almacen = Almacen::where('almacen_id', $detalles[$r]->item_almacen->almacen_id)->first();
                $detalles[$r]->item_almacen->almacen->empresa = Empresa::where('empresa_id', $detalles[$r]->item_almacen->almacen->empresa_id)->first();
            }

            $path = null;
            if ($productos[$i]->preview_img == null) {
                if (count($productos[$i]->producto_detalle) == 1) {
                    $path = $productos[$i]->producto_detalle[0]->item_almacen->preview_img;
                }
            } else {
                $path = $productos[$i]->preview_img;
            }

            $productos[$i]->preview_img = $path;

        }
            
        return $productos;


    }
}
