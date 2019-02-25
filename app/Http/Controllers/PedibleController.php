<?php

namespace App\Http\Controllers;

use App\Almacen;
use App\Comprador;
use App\Empresa;
use App\Error;
use App\Freeler;
use App\ItemAlmacen;
use App\Producto;
use App\ProductoDetalle;
use App\Respuesta;
use App\Token;
use App\Afiche;
use App\TokenUsuario;
use App\Usuario;
use App\Pedido;
use App\PedidoDetalle;
use App\PedibleDisponible;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PedibleController extends Controller
{
    //tipo-> 1: propios, 2:terceros
    public function listar(Request $request, $token, $tipo ,$condicion){
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

        $freelerFind = Freeler::where('usuario_id', $usuariofind->usuario_id)->first();
        if ($freelerFind == null) {
            $contenidoError = Error::getError(24);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $cond="";
        if($condicion=="_" || $condicion=="") {
            $cond="";
        }else{
            $cond=$condicion;
        }


        $disponibles= PedibleDisponible::where(function($a) use ($tipo,$freelerFind){
            if($tipo==1){
                $a->where('freeler',$freelerFind->freeler_id);
            }else{
                $a->where('freeler','!=',$freelerFind->freeler_id)
                ->where('tercerizable',1);
            }
            
        })
        ->where(function($a) use($condicion){
            if($condicion!="_"){
                $a->where('nombre','like','%'.$condicion.'%')
                ->orWhere('descripcion','like','%'.$condicion.'%');
            }
        })
        ->where('activo',1)        
        ->orderBy('nombre')
        ->with('producto')        
        ->with('producto.producto_detalle')
        ->with('producto.producto_detalle.item_almacen')
        ->with('producto.producto_detalle.item_almacen.almacen')
        ->with('producto.producto_detalle.item_almacen.almacen.empresa')
        ->with('afiche')
        ->with('afiche.grupo_afiche')
        ->with('afiche.afiche_detalle')
        ->with('afiche.afiche_detalle.producto')
        ->with('afiche.afiche_detalle.producto.producto_detalle')
        ->with('afiche.afiche_detalle.producto.producto_detalle.item_almacen')
        ->with('afiche.afiche_detalle.producto.producto_detalle.item_almacen.almacen')
        ->with('afiche.afiche_detalle.producto.producto_detalle.item_almacen.almacen.empresa')
        ->get();

        $rpta->objeto = $disponibles;
        $rpta->tieneError = false;
        return $rpta;

        

        if($condicion == null || $condicion == "_") {
            $items = Producto::whereHas('empresa', function ($q) {
                $q->whereHas('freeler', function ($a) {
                    $a->where('usuario_id', session('usuario_id'));
                });
            })->where('activo', 1)
                ->with('producto_detalle')
                ->get();

        } else {
            $items = Producto::whereHas('empresa', function ($q) {
                $q->whereHas('freeler', function ($a) {
                    $a->where('usuario_id', session('usuario_id'));
                });
            })->where(
                [
                    ['activo', 1],
                    ['producto_nombre', 'like', '%' . $condicion . '%'],
                ]
            )
                ->with('producto_detalle')
                ->get();
        }

        for ($i = 0; $i < count($items); $i++) {
            $detalles = $items[$i]->producto_detalle;
            for ($r = 0; $r < count($detalles); $r++) {
                $detalles[$r]->item_almacen = ItemAlmacen::where('item_almacen_id', $detalles[$r]->item_almacen_id)->first();
                $detalles[$r]->item_almacen->almacen = Almacen::where('almacen_id', $detalles[$r]->item_almacen->almacen_id)->first();
                $detalles[$r]->item_almacen->almacen->empresa = Empresa::where('empresa_id', $detalles[$r]->item_almacen->almacen->empresa_id)->first();
            }

            $path = null;
            if ($items[$i]->preview_img == null) {
                if (count($items[$i]->producto_detalle) == 1) {
                    $path = $items[$i]->producto_detalle[0]->item_almacen->preview_img;
                }
            } else {
                $path = $items[$i]->preview_img;
            }

            $items[$i]->preview_img = $path;

        }

        $rpta->objeto = $items;
        $rpta->tieneError = false;
        return $rpta;
    }
}

