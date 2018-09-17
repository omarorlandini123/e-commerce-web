<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Token;

class UsuarioController extends Controller
{
    public function login($token){
        return Usuario::all();
    }

    public function registro(Request $request, $token){
        $token_var=Token::where('token',$token)->first();
        if($token_var==null || count($token_var)==0){
            return Error::getError(TipoError::E_0005);
        }

        $validatedData = $request->validate([
            'nombre' => 'required|max:250',
            'apellido_pa' => 'required|max:250',
            'apellido_ma' => 'required|max:250',
            'email' => 'required|max:250',
            'codigo_ref' => 'integer',
        ]);

        if(count($validatedData->errors())>0){
            return Error::getError(TipoError::E_0006);
        }
        
    
    }

}
