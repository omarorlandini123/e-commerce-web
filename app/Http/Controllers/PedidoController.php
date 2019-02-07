<?php

namespace App\Http\Controllers;

use App\Almacen;
use App\Empresa;
use App\Error;
use App\ItemAlmacen;
use App\Pedido;
use App\Producto;
use App\Respuesta;
use App\Token;
use App\TokenUsuario;
use App\Usuario;
use App\Afiche;
use App\Pedible;
use App\Freeler;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function listar(Request $request, $token)
    {
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

        $pedibles = Pedible::where('freeler_shared_id',$freelerFind->freeler_id)
        ->where('freeler_id',$freelerFind->freeler_id)        
        ->orderBy('ult_pedido','desc')
        ->with([
            'producto',
            'producto.producto_detalle',
            'producto.producto_detalle.item_almacen',
            'producto.producto_detalle.item_almacen.almacen',
            'producto.producto_detalle.item_almacen.almacen.empresa',
            'producto.empresa',
            'afiche',
            'afiche.empresa'])        
        ->get();
        return $pedibles;

        // $productos = Producto::whereHas('detalle_pedido', function ($a) {
        //     $a->whereHas('pedido', function ($b) {
        //         $b->whereHas('freeler', function ($c) {
        //         })->WhereNull('afiche_id')
        //         ->where('eliminado',0);
        //     });
        // })->whereHas('empresa', function ($b) {
        //     $b->whereHas('freeler', function ($c) {
        //         $c->where('usuario_id', $this->usuario_id);
        //     });
        // })
        //     ->with(['detalle_pedido', 'detalle_pedido.pedido', 'detalle_pedido.producto', 'producto_detalle', 'detalle_pedido.pedido.freeler', 'detalle_pedido.pedido.freeler.usuario'])
        //     ->get();

        // for ($i = 0; $i < count($productos); $i++) {
        //     $detalles = $productos[$i]->producto_detalle;
        //     for ($r = 0; $r < count($detalles); $r++) {
        //         $detalles[$r]->item_almacen = ItemAlmacen::where('item_almacen_id', $detalles[$r]->item_almacen_id)->first();
        //         $detalles[$r]->item_almacen->almacen = Almacen::where('almacen_id', $detalles[$r]->item_almacen->almacen_id)->first();
        //         $detalles[$r]->item_almacen->almacen->empresa = Empresa::where('empresa_id', $detalles[$r]->item_almacen->almacen->empresa_id)->first();
        //     }

        //     $path = null;
        //     if ($productos[$i]->preview_img == null) {
        //         if (count($productos[$i]->producto_detalle) == 1) {
        //             $path = $productos[$i]->producto_detalle[0]->item_almacen->preview_img;
        //         }
        //     } else {
        //         $path = $productos[$i]->preview_img;
        //     }

        //     $productos[$i]->preview_img = $path;

        // }

        return $productos;

    }

    public function listar_terceros(Request $request, $token)
    {


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

        $pedibles = Pedible::where('freeler_shared_id',$freelerFind->freeler_id)
        ->where('freeler_id','!=',$freelerFind->freeler_id)
        ->orderBy('ult_pedido','desc')
        ->with([
            'producto',
            'producto.producto_detalle',
            'producto.producto_detalle.item_almacen',
            'producto.producto_detalle.item_almacen.almacen',
            'producto.producto_detalle.item_almacen.almacen.empresa',
            'producto.empresa',
            'afiche',
            'afiche.empresa'])
        ->get();
        return $pedibles;


        // $rpta = new Respuesta;

        // $token_var = Token::where('token', $token)->first();

        // if ($token_var == null || count($token_var) == 0) {
        //     $contenidoError = Error::getError(5);
        //     $rpta->tieneError = true;
        //     $rpta->error = $contenidoError;
        //     return $rpta;
        // }

        // $token_var = Token::where('token', $token)->first();

        // if ($token_var == null || count($token_var) == 0) {
        //     $contenidoError = Error::getError(5);
        //     $rpta->tieneError = true;
        //     $rpta->error = $contenidoError;
        //     return $rpta;
        // }

        // $tokenUsuarioFound = TokenUsuario::where('token_token_id', $token_var->token_id)->first();
        // if ($tokenUsuarioFound == null) {
        //     $contenidoError = Error::getError(9);
        //     $rpta->tieneError = true;
        //     $rpta->error = $contenidoError;
        //     return $rpta;
        // }

        // $usuariofind = Usuario::where('usuario_id', $tokenUsuarioFound->usuario_usuario_id)->first();
        // if ($usuariofind == null) {
        //     $contenidoError = Error::getError(9);
        //     $rpta->tieneError = true;
        //     $rpta->error = $contenidoError;
        //     return $rpta;
        // }
        // $this->usuario_id = $usuariofind->usuario_id;

        // $productos = Producto::whereHas('detalle_pedido', function ($a) {
        //     $a->whereHas('pedido', function ($b) {
        //         $b->whereHas('freeler', function ($c) {
        //             $c->where('usuario_id', $this->usuario_id);
        //         })->where('eliminado',0);
        //     });
        // })->whereHas('empresa', function ($b) {
        //     $b->whereHas('freeler', function ($c) {
        //         $c->where('usuario_id', '!=', $this->usuario_id);
        //     });
        // })
        //     ->with(['detalle_pedido', 'detalle_pedido.pedido', 'detalle_pedido.producto', 'producto_detalle', 'detalle_pedido.pedido.freeler', 'detalle_pedido.pedido.freeler.usuario'])
        //     ->get();

        // for ($i = 0; $i < count($productos); $i++) {
        //     $detalles = $productos[$i]->producto_detalle;
        //     for ($r = 0; $r < count($detalles); $r++) {
        //         $detalles[$r]->item_almacen = ItemAlmacen::where('item_almacen_id', $detalles[$r]->item_almacen_id)->first();
        //         $detalles[$r]->item_almacen->almacen = Almacen::where('almacen_id', $detalles[$r]->item_almacen->almacen_id)->first();
        //         $detalles[$r]->item_almacen->almacen->empresa = Empresa::where('empresa_id', $detalles[$r]->item_almacen->almacen->empresa_id)->first();
        //     }

        //     $path = null;
        //     if ($productos[$i]->preview_img == null) {
        //         if (count($productos[$i]->producto_detalle) == 1) {
        //             $path = $productos[$i]->producto_detalle[0]->item_almacen->preview_img;
        //         }
        //     } else {
        //         $path = $productos[$i]->preview_img;
        //     }

        //     $productos[$i]->preview_img = $path;

        // }

        // return $productos;

    }

    public function listar_afiches(Request $request, $token)
    {
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
        $this->usuario_id = $usuariofind->usuario_id;

        $afiches = Afiche::whereHas('pedido', function ($b) {
            $b->whereHas('freeler', function ($c) {
            })->WhereNotNull('afiche_id')
            ->where('eliminado',0);
        })->whereHas('empresa', function ($b) {
            $b->whereHas('freeler', function ($c) {
                $c->where('usuario_id', $this->usuario_id);
            });
        })
        ->with([
            'pedido.detalle_pedido', 
            'pedido.detalle_pedido', 
            'pedido.detalle_pedido.producto', 
            'pedido.detalle_pedido.producto.producto_detalle', 
            'pedido.detalle_pedido.producto.producto_detalle.item_almacen', 
            'pedido.detalle_pedido.producto.producto_detalle.item_almacen.almacen', 
            'pedido.detalle_pedido.producto.producto_detalle.item_almacen.almacen.empresa', 
            'pedido.freeler', 
            'pedido.freeler.usuario',
            'empresa'])
        ->get();

  
        return $afiches;

    }

    public function listar_terceros_afiches(Request $request, $token)
    {
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
        $this->usuario_id = $usuariofind->usuario_id;

       


        $afiches = Afiche::whereHas('pedido', function ($b) {
            $b->whereHas('freeler', function ($c) {
                $c->where('usuario_id', $this->usuario_id);
            })->WhereNotNull('afiche_id')
            ->where('eliminado',0);
        })->whereHas('empresa', function ($b) {
            $b->whereHas('freeler', function ($c) {
                $c->where('usuario_id', '!=', $this->usuario_id);
            });
        })
        ->with([
            'pedido.detalle_pedido', 
            'pedido.detalle_pedido', 
            'pedido.detalle_pedido.producto', 
            'pedido.detalle_pedido.producto.producto_detalle', 
            'pedido.detalle_pedido.producto.producto_detalle.item_almacen', 
            'pedido.detalle_pedido.producto.producto_detalle.item_almacen.almacen', 
            'pedido.detalle_pedido.producto.producto_detalle.item_almacen.almacen.empresa', 
            'pedido.freeler', 
            'pedido.freeler.usuario',
            'empresa'])
        ->get();

  
        return $afiches;

     

    }

    public function pedidos_producto(Request $request, $idProducto, $token)
    {
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

        $productoFind = Producto::where('producto_id', $idProducto)->first();
        if ($productoFind == null) {
            $contenidoError = Error::getError(29);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $this->usuario_id = $usuariofind->usuario_id;
        $this->idProducto = $idProducto;

        $pedidos = Pedido::whereHas('detalle_pedido', function ($a) {
            $a->whereHas('producto', function ($b) {
                $b->where('producto_id', $this->idProducto);
            });
        })->whereHas('freeler', function ($a) {
            $a->where('usuario_id', $this->usuario_id);
        })->where('eliminado',0)
        ->orderBy('fecha_creacion','desc')
        ->with(['comprador', 'freeler', 'detalle_pedido', 'detalle_pedido.producto', 'comprador.usuario', 'freeler.usuario'])->get();

        return $pedidos;

    }

    public function pedidos_afiche(Request $request, $idAfiche, $token)
    {
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



        $aficheFind = Afiche::where('afiche_id',$idAfiche)->first();
        if ($aficheFind == null) {
            $contenidoError = Error::getError(28);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

      
        $this->usuario_id = $usuariofind->usuario_id;
        $this->idAfiche = $idAfiche;

        $pedidos= Pedido::where('afiche_id',$idAfiche)
        ->where('eliminado',0)
        ->where('freeler_shared_id',$freelerFind->freeler_id)
        ->orderBy('fecha_creacion','desc')
        ->with(['comprador', 'freeler', 'detalle_pedido', 'detalle_pedido.producto', 'comprador.usuario', 'freeler.usuario'])
        ->get();

        // $pedidos = Pedido::whereHas('detalle_pedido', function ($a) {
        //     $a->whereHas('producto', function ($b) {
        //         $b->where('producto_id', $this->idProducto);
        //     });
        // })->whereHas('freeler', function ($a) {
        //     $a->where('usuario_id', $this->usuario_id);
        // })->with(['comprador', 'freeler', 'detalle_pedido', 'detalle_pedido.producto', 'comprador.usuario', 'freeler.usuario'])->get();

        return $pedidos;

    }

    public function enviar_pedido(Request $request, $idPedido, $token)
    {
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

        $pedidoFind = Pedido::where('pedido_id', $idPedido)->first();
        if ($pedidoFind == null) {
            $contenidoError = Error::getError(29);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        if ($pedidoFind->enviado == 0) {
            $pedidoFind->enviado = 1;
        } else {
            $pedidoFind->enviado = 0;
        }
        $pedidoFind->save();

        $contenidoError = Error::getError(29);
        $rpta->tieneError = false;
        return $rpta;
    }

    public function pagar_pedido(Request $request, $idPedido, $token)
    {
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

        $pedidoFind = Pedido::where('pedido_id', $idPedido)->first();
        if ($pedidoFind == null) {
            $contenidoError = Error::getError(29);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        if ($pedidoFind->pagado == 0) {
            $pedidoFind->pagado = 1;
        } else {
            $pedidoFind->pagado = 0;
        }
        $pedidoFind->save();

        $contenidoError = Error::getError(29);
        $rpta->tieneError = false;
        return $rpta;
    }

    public function eliminar_pedido(Request $request, $idPedido, $token)
    {
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

        $pedidoFind = Pedido::where('pedido_id', $idPedido)->first();
        if ($pedidoFind == null) {
            $contenidoError = Error::getError(29);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        if ($pedidoFind->eliminado == 0) {
            $pedidoFind->eliminado = 1;
        } else {
            $pedidoFind->eliminado = 0;
        }
        $pedidoFind->save();

        $contenidoError = Error::getError(29);
        $rpta->tieneError = false;
        return $rpta;
    }
}
