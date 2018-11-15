<?php

namespace App\Http\Controllers;

use App\Error;
use App\Respuesta;
use App\Ubicaciones;
use App\Token;
use App\TokenUsuario;
use App\Usuario;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function listarUbicaciones(Request $request, $token)
    {
        $rpta = new Respuesta;

        

        $ubicaciones = Ubicaciones::where('ubicacion','like',"%Lima%")->get();

        $rpta->tieneError = false;
        $rpta->objeto = $ubicaciones;
        return $rpta;


    }

}
