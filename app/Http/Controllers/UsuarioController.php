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
        if($token_var==null){
            
        }
    
    }

}
