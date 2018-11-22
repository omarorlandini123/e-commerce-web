<?php

namespace App\Http\Controllers;

use App\Producto;
use App\ProductoDetalle;
use App\Token;
use Carbon\Carbon;
use App\ItemAlmacen;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function crear(Request $request, $token)
    {
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

        $format = 'd/m/Y';
        $date = Carbon::createFromFormat($format, $valido);
        $producto->producto_hasta = $date;
        $producto->empresa_id = 1;
        $producto->activo = 1;
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
        $rpta->error = $contenidoError;
        return $rpta;

    }
}
