<?php

namespace App\Http\Controllers;

use App\ItemAlmacen;
use App\Producto;
use App\ProductoDetalle;
use App\Respuesta;
use App\Token;
use App\TokenUsuario;
use App\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductoController extends Controller
{
    public function listar_mis_productos(Request $request, $token)
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
            $items = Producto::whereHas('producto_detalle', function ($q) {
                $q->whereHas('empresa', function ($a) {
                    $a->whereHas('freeler', function ($b) {
                        $b->where('usuario_id', session('usuario_id'));
                    });
                });
            })->where('activo', 1)->get();
        } else {
            $items = ItemAlmacen::whereHas('almacen', function ($q) {
                $q->whereHas('empresa', function ($a) {
                    $a->whereHas('freeler', function ($b) {
                        $b->where('usuario_id', session('usuario_id'));
                    });
                });
            })->where([['activo', 1], ['item_almacen_titulo', 'like', '%' . $condicion . '%']])->get();
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

        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $precio = $request->input('precio');
        $valido = $request->input('fecha_hasta');
        $tercerizable = $request->input('tercerizable');
        $items = $request->input('items');

        $producto = new Producto;
        $producto->producto_nombre = $nombre;
        $producto->producto_descripcion = $descripcion;
        $producto->producto_precio = $precio;
        $producto->producto_fec_creacion = Carbon::now();
        $producto->producto_es_tercerizable = $tercerizable; // entero
        $producto->producto_desde = Carbon::now();
        if ($request->has('fecha_hasta')) {
            $format = 'd/m/Y';
            $date = Carbon::createFromFormat($format, $valido);
            $producto->producto_hasta = $date;
        }

        $producto->empresa_id = 1;
        $producto->activo = 1;
        if ($request->hasFile('preview')) {
            $nombrePreview = md5(uniqid(rand(), true)) . '.jpg';
            $path = $request->file('preview')->storeAs('preview_producto', $nombrePreview);
            $producto->preview_img = $nombrePreview;
        }
        $producto->save();

        $items_arr = ItemAlmacen::whereRaw(" item_almacen_id in (" . $items . ") ")->get();

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
}
