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
use App\TokenUsuario;
use App\Usuario;
use App\Pedido;
use App\PedidoDetalle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductoController extends Controller
{

    public function index(Request $request, $idProducto, $token)
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

        $producto = Producto::where('producto_id', $idProducto)->first();
        if ($producto == null) {
            $contenidoError = Error::getError(29);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $rpta->objeto = $producto;
        $rpta->tieneError = false;

        $data = array(
            'rpta' => $rpta,
            'token' => $token,
        );
        $request->session()->put('producto_id', $idProducto);
        $request->session()->put('producto_token', $token);

        return view('productos.index')->with($data);
    }

    public function pedir(Request $request, $idProducto, $token)
    {
        $cantidad = $request->input('txt_cantidad');
       
        if($cantidad!=null && $cantidad>0){
            $request->session()->put('producto_cant', $cantidad);
        }else{
            if ($request->session()->has('producto_cant')) {
                $cantidad = $request->session()->get('producto_cant');
            }
        }


        if (!$request->session()->has('comprador_id')) {
            $request->session()->put('producto_id', $idProducto);
            $request->session()->put('producto_token', $token);
            return redirect()->route('usuario.login');
        }

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

        

        $producto = Producto::where('producto_id', $idProducto)->first();
        if ($producto == null) {
            $contenidoError = Error::getError(29);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $comprador = null;
        $direccion = null;
        if ($request->session()->has('comprador_id')) {
            $comprador = Comprador::where('comprador_id', $request->session()->get('comprador_id'))->first();
            $direccion = $comprador->usuario->direccion;
        }

        $rpta->objeto = $producto;
        $rpta->tieneError = false;

        $data = array(
            'rpta' => $rpta,
            'token' => $token,
            'cantidad' => $cantidad,
            'direccion' => $direccion,
            'comprador' => $comprador,
        );

        return view('productos.pedir')->with($data);
    }
    public function confirmar(Request $request, $idProducto, $token)
    {
        if (!$request->session()->has('comprador_id')) {
            $request->session()->put('producto_id', $idProducto);
            $request->session()->put('producto_token', $token);
            return redirect()->route('usuario.login');
        }

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

        $usuariofind = Usuario::where('usuario_id', $tokenUsuarioFound->usuario_usuario_id)->first();
        if ($usuariofind == null) {
            $contenidoError = Error::getError(9);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $freeler = Freeler::where('usuario_id', $usuariofind->usuario_id)->first();
        if ($freeler == null) {
            $contenidoError = Error::getError(24);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        

        $producto = Producto::where('producto_id', $idProducto)->first();
        if ($producto == null) {
            $contenidoError = Error::getError(29);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $comprador = null;
        $direccion = null;
        if ($request->session()->has('comprador_id')) {
            $comprador = Comprador::where('comprador_id', $request->session()->get('comprador_id'))->first();
            $direccion = $comprador->usuario->direccion;
        }

        $pedido = new Pedido;
        $pedido->fecha_creacion=Carbon::now()->subHours(5);
        $pedido->comprador_id=$comprador->comprador_id;
        $pedido->freeler_shared_id=$freeler->freeler_id;
        $pedido->direccion_envio=$request->input('txt_envio');
        $pedido->save();

        if($pedido->pedido_id>0){
            $detPedido= new PedidoDetalle;
            $detPedido->cantidad=$request->input('txt_cantidad');
            $detPedido->producto_id=$producto->producto_id;
            $detPedido->pedido_id=$pedido->pedido_id;
            $detPedido->save();

            if($detPedido->detalle_pedido_id>0){
                $data = array(
                    'exito' =>'hemos registrado tu pedido :D'
                );
                $request->session()->forget('producto_id');
                $request->session()->forget('producto_token');
                return view('principal.success')->with($data);
            }
        }

        $data = array(
            'error' =>'no se ha registrado tu pedido :('
        );

        return view('principal.error')->with($data);

        
    }

    public function listar_productos_terceros(Request $request, $token, $condicion)
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

        session(['usuario_id' => $usuariofind->usuario_id]);
        $items = array();

        if ($condicion == null || $condicion == "_") {
            $items = Producto::whereHas('empresa', function ($q) {
                $q->whereHas('freeler', function ($a) {
                    $a->whereRaw('usuario_id not in (' . session('usuario_id') . ')');
                });
            })->where([['activo', 1], ['producto_es_tercerizable', 1]])
                ->with('producto_detalle')
                ->get();

        } else {
            $items = Producto::whereHas('empresa', function ($q) {
                $q->whereHas('freeler', function ($a) {
                    $a->whereRaw('usuario_id not in (' . session('usuario_id') . ')');
                });
            })->where(
                [
                    ['activo', 1],
                    ['producto_es_tercerizable', 1],
                    ['producto_nombre', 'like', '%' . $condicion . '%'],
                ]
            )
                ->with('producto_detalle')
                ->get();
        }

        for ($i = 0; $i < count($items); $i++) {
            $detalles = $items[$i]->producto_detalle;

            $path = null;
            if ($items[$i]->preview_img == null) {
                if (count($items[$i]->producto_detalle) == 1) {
                    $path = $items[$i]->producto_detalle[0]->item_almacen->preview_img;
                }
            } else {
                $path = $items[$i]->preview_img;
            }

            $items[$i]->preview_img = $path;
            for ($r = 0; $r < count($detalles); $r++) {
                $detalles[$r]->item_almacen = ItemAlmacen::where('item_almacen_id', $detalles[$r]->item_almacen_id)->first();
                $detalles[$r]->item_almacen->almacen = Almacen::where('almacen_id', $detalles[$r]->item_almacen->almacen_id)->first();
                $detalles[$r]->item_almacen->almacen->empresa = Empresa::where('empresa_id', $detalles[$r]->item_almacen->almacen->empresa_id)->first();
            }
        }

        $rpta->objeto = $items;
        $rpta->tieneError = false;
        return $rpta;
    }

    public function listar_mis_productos(Request $request, $token, $condicion)
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

        session(['usuario_id' => $usuariofind->usuario_id]);
        $items = array();

        if ($condicion == null || $condicion == "_") {
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
    public function crear(Request $request, $token)
    {
        $rpta = new Respuesta;
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
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

        $freeler = Freeler::where('usuario_id', $usuariofind->usuario_id)->first();
        if ($freeler == null) {
            $contenidoError = Error::getError(24);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $empresa = Empresa::where([['freeler_id', $freeler->freeler_id], ['activo', 1]])->first();
        if ($empresa == null) {
            $contenidoError = Error::getError(27);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $precio = $request->input('precio');
        $valido = $request->input('fecha_hasta');
        $tercerizable = $request->input('tercerizable');
        $items = $request->input('items');

        $items_arr = ItemAlmacen::whereRaw(" item_almacen_id in (" . $items . ") ")->get();

        if (count($items_arr) ==0) {
            $contenidoError = Error::getError(25);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $producto = new Producto;
        $producto->producto_nombre = $nombre;
        $producto->producto_descripcion = $descripcion;
        $producto->producto_precio = $precio;
        $producto->producto_fec_creacion = Carbon::now()->subHours(5);
        $producto->producto_es_tercerizable = $tercerizable; // entero
        $producto->producto_desde = Carbon::now();
        if ($request->has('fecha_hasta')) {
            $format = 'd/m/Y';
            $date = Carbon::createFromFormat($format, $valido);
            $producto->producto_hasta = $date;
        }

        $producto->empresa_id = $items_arr[0]->almacen->empresa->empresa_id;
        $producto->activo = 1;
        if ($request->hasFile('preview')) {
            $nombrePreview = md5(uniqid(rand(), true)) . '.jpg';
            $path = $request->file('preview')->storeAs('preview_producto', $nombrePreview);
            $producto->preview_img = $nombrePreview;
        }
        $producto->save();

        

        if (count($items_arr) > 0) {
            foreach ($items_arr as $item) {
                $detalleProducto = new ProductoDetalle;
                $detalleProducto->producto_detalle_cantidad = 1;
                $detalleProducto->producto_id = $producto->producto_id;
                $detalleProducto->item_almacen_id = $item->item_almacen_id;
                $detalleProducto->save();
            }
        } else {
            $contenidoError = Error::getError(25);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $rpta->tieneError = false;
        return $rpta;

    }

    public function eliminar(Request $request, $idProducto, $token)
    {
        $rpta = new Respuesta;
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $tokenUsuarioFound = TokenUsuario::where('token_token_id', $token_var->token_id)->first();
        if ($tokenUsuarioFound == null) {
            return Error::getError(23);
        }

        $usuariofind = Usuario::where('usuario_id', $tokenUsuarioFound->usuario_usuario_id)->first();
        if ($usuariofind == null) {
            return Error::getError(9);
        }

        $productoFind = Producto::where('producto_id', $idProducto)->first();
        if ($productoFind == null) {
            return Error::getError(29);
        }

        $productoFind->activo = 0;
        $productoFind->save();

        $rpta->tieneError = false;
        return $rpta;

    }
    public function getPreview(Request $request, $idProducto, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $tokenUsuarioFound = TokenUsuario::where('token_token_id', $token_var->token_id)->first();
        if ($tokenUsuarioFound == null) {
            return Error::getError(23);
        }

        $usuariofind = Usuario::where('usuario_id', $tokenUsuarioFound->usuario_usuario_id)->first();
        if ($usuariofind == null) {
            return Error::getError(9);
        }

        $productoFind = Producto::where([['producto_id', $idProducto], ['activo', 1]])->first();
        if ($productoFind == null) {
            return Error::getError(18);
        }

        $path = "";
        if ($productoFind->preview_img == null) {
            if (count($productoFind->producto_detalle) == 1) {
                $path = storage_path('app/preview_item_almacen/') . $productoFind->producto_detalle[0]->item_almacen->preview_img;
            }
        } else {
            $path = storage_path('app/preview_producto/') . $productoFind->preview_img;
        }

        if ($path != "") {

            if (file_exists($path)) {
                $img = Image::make($path);
                $img->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                return $img->response();
            }
        }

        return "";

    }
    public function getPreviewTiny(Request $request, $idProducto, $token)
    {
        $token_var = Token::where('token', $token)->first();

        if ($token_var == null || count($token_var) == 0) {
            return Error::getError(5);
        }

        $tokenUsuarioFound = TokenUsuario::where('token_token_id', $token_var->token_id)->first();
        if ($tokenUsuarioFound == null) {
            return Error::getError(23);
        }

        $usuariofind = Usuario::where('usuario_id', $tokenUsuarioFound->usuario_usuario_id)->first();
        if ($usuariofind == null) {
            return Error::getError(9);
        }

        $productoFind = Producto::where([['producto_id', $idProducto], ['activo', 1]])->first();
        if ($productoFind == null) {
            return Error::getError(18);
        }

        $path = "";
        if ($productoFind->preview_img == null) {
            if (count($productoFind->producto_detalle) == 1) {
                $path = storage_path('app/preview_item_almacen/') . $productoFind->producto_detalle[0]->item_almacen->preview_img;
            }
        } else {
            $path = storage_path('app/preview_producto/') . $productoFind->preview_img;
        }

        if ($path != "") {

            if (file_exists($path)) {
                $img = Image::make($path);
                $img->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });

                return $img->response();
            }
        }

        return "";

    }
}
