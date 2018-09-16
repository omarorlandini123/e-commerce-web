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

}
