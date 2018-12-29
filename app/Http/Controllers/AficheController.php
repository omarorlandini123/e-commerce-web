<?php

namespace App\Http\Controllers;

use App\Afiche;
use App\AficheDetalle;
use App\GrupoAfiche;
use App\Empresa;
use App\Error;
use App\Freeler;
use App\ItemAlmacen;
use App\Producto;
use App\Respuesta;
use App\Token;
use App\TokenUsuario;
use App\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AficheController extends Controller
{

    public function listar(Request $request, $token, $condicion)
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
        $afiches = array();
        if ($condicion == null || $condicion == "_") {
            $afiches = Afiche::whereHas('empresa', function ($a) {
                $a->whereHas('freeler', function ($b) {
                    $b->where('usuario_id', session('usuario_id'));
                });
            })->with('empresa')
            ->with('grupo_afiche')
            ->with('grupo_afiche.afiche_detalle')
            ->with('grupo_afiche.afiche')
            ->where('activo', 1)->get();

        } else {

            $afiches = Afiche::whereHas('empresa', function ($a) {
                $a->whereHas('freeler', function ($b) {
                    $b->where('usuario_id', session('usuario_id'));
                });
            })->with('empresa')
            ->with('grupo_afiche')
            ->with('grupo_afiche.afiche_detalle')
            ->with('grupo_afiche.afiche')
            ->where([['activo', 1], ['afiche_nombre', 'like', '%' . $condicion . '%']])->get();

        }

        for ($i = 0; $i < count($afiches); $i++) {
            $afiches[$i]->afiche_detalle = AficheDetalle::where('afiche_id', $afiches[$i]->afiche_id)->get();
            for ($j = 0; $j < count($afiches[$i]->afiche_detalle); $j++) {
                $afiches[$i]->afiche_detalle[$j]->producto = Producto::where('producto_id', $afiches[$i]->afiche_detalle[$j]->producto_id)->first();
                $productoSE = $afiches[$i]->afiche_detalle[$j]->producto;

                $detallesSE = $productoSE->producto_detalle;

                $path = null;
                if ($productoSE->preview_img == null) {
                    if (count($productoSE->producto_detalle) == 1) {
                        $path = $productoSE->producto_detalle[0]->item_almacen->preview_img;
                    }
                } else {
                    $path = $productoSE->preview_img;
                }

                $productoSE->preview_img = $path;
                for ($r = 0; $r < count($detallesSE); $r++) {
                    $detallesSE[$r]->item_almacen = ItemAlmacen::where('item_almacen_id', $detallesSE[$r]->item_almacen_id)->with('almacen')->first();

                }

            }
        }

        $rpta->objeto = $afiches;
        $rpta->tieneError = false;
        return $rpta;
    }

    public function eliminar(Request $request, $idAfiche, $token)
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

        $aficheFind = Afiche::where('afiche_id', $idAfiche)->first();
        if ($aficheFind == null) {
            return Error::getError(28);
        }

        $aficheFind->activo = 0;
        $aficheFind->save();

        $rpta->tieneError = false;
        return $rpta;

    }

    public function getPreview(Request $request, $idAfiche, $token)
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

        $aficheFind = Afiche::where([['afiche_id', $idAfiche], ['activo', 1]])->first();
        if ($aficheFind == null) {
            return Error::getError(18);
        }

        $path = storage_path('app/preview_afiche/') . $aficheFind->preview_img;

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
        $productos = $request->input('productos');

        $productos_arr = Producto::whereRaw(" producto_id in (" . $productos . ") ")->get();

        if (count($productos_arr) == 0) {
            $contenidoError = Error::getError(25);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $afiche = new Afiche;
        $afiche->afiche_nombre = $nombre;
        $afiche->afiche_descripcion = $descripcion;
        $afiche->afiche_fecha_creacion = Carbon::now();
        $afiche->empresa_id = $productos_arr[0]->empresa->empresa_id;
        $afiche->activo = 1;

        if ($request->hasFile('preview')) {
            $nombrePreview = md5(uniqid(rand(), true)) . '.jpg';
            $path = $request->file('preview')->storeAs('preview_afiche', $nombrePreview);
            $afiche->preview_img = $nombrePreview;
        }
        $afiche->save();

        if (count($productos_arr) > 0) {
            foreach ($productos_arr as $producto) {
                $detalleAfiche = new AficheDetalle;
                $detalleAfiche->producto_id = $producto->producto_id;
                $detalleAfiche->afiche_id = $afiche->afiche_id;
                $detalleAfiche->save();
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

    public function asignar_grupo(Request $request, $token){
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
        

        $nombre = $request->input('nombre');
        $afiche_id = $request->input('afiche_id');
        $producto_id = $request->input('producto_id');
        $grupo_id = $request->input('grupo_id');

        $afiche = Afiche::where('afiche_id', $afiche_id)->first();
        if ($afiche == null) {
            $contenidoError = Error::getError(28);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $producto = Producto::where('producto_id', $producto_id)->first();
        if ($producto == null) {
            $contenidoError = Error::getError(29);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $grupo = GrupoAfiche::where('grupo_afiche_id', $grupo_id)->first();
        if ($grupo == null) {
            $contenidoError = Error::getError(32);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }
        
        $afiche_detalle = AficheDetalle::where('afiche_id',$afiche_id)
        ->where('producto_id', $producto_id)
        ->first();

        $afiche_detalle->grupo_afiche_id=$grupo_id;
        $afiche_detalle->save();
        

       
        $rpta->tieneError = false;
        return $rpta;
    }

    public function crear_grupo(Request $request, $token)
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
        

        $nombre = $request->input('nombre');
        $afiche_id = $request->input('afiche_id');

        $afiche = Afiche::where('afiche_id', $afiche_id)->first();

        if ($afiche == null) {
            $contenidoError = Error::getError(28);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $grupo= new GrupoAfiche;
        $grupo->nombre= $nombre;
        $grupo->activo=1;
        $grupo->afiche_id=$afiche->afiche_id;
        $grupo->save();       
        

       
        $rpta->tieneError = false;
        return $rpta;

    }

    public function show(Request $request, $idAfiche, $token)
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

        $afiche = Afiche::where('afiche_id', $idAfiche)->first();
        if ($afiche == null) {
            $contenidoError = Error::getError(28);
            $rpta->tieneError = true;
            $rpta->error = $contenidoError;
            return $rpta;
        }

        $data = array(
            'afiche' => $afiche,
            'token' => $token,
        );

        return view('afiches.index')->with($data);

    }
}
