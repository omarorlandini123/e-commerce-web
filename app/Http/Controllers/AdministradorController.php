<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;

class AdministradorController extends Controller
{
    public function empresas_index(Request $request){
      
        $encontrados = Empresa::orderBy('empresa_nombre')->paginate(6);
        $empresa=  $encontrados[0];
        $data=array(
            'encontrados'=>$encontrados,
            'empresa'=>$empresa
        ) ;   
        return view('administrador.empresas')->with($data);
    }

    public function empresas_buscar(Request $request,$cond){
      
        $encontrados = Empresa::where('empresa_nombre','like','%'.$cond.'%')->orderBy('empresa_nombre')->paginate(6);
        $empresa=  $encontrados[0];
        $data=array(
            'encontrados'=>$encontrados,
            'empresa'=>$empresa
        ) ;   
        return view('administrador.empresas')->with($data);
    }

    public function empresas_show(Request $request,$empresa_id){
        $encontrados = Empresa::orderBy('empresa_nombre')->paginate(6);
        $empresa= Empresa::where('empresa_id',$empresa_id)->first();
        $data=array(
            'encontrados'=>$encontrados,
            'empresa'=>$empresa
        ) ; 
        return view('administrador.empresadetalle')->with($data);
    }
}
