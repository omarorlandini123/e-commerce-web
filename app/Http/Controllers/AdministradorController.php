<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class AdministradorController extends Controller
{
    public function empresas_index(Request $request){
        return view('administrador.empresas');
    }
    public function empresas_show(Request $request,$empresa_id){
        $empresa= Empresa::where('empresa_id',$empresa_id)->first();
        return view('administrador.empresa_show',['empresa'=>$empresa]);
    }
}
