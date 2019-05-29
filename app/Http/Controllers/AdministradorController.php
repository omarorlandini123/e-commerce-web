<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    public function empresas_index(Request $request){
        return view('administrador.empresas');
    }
}
