<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenUsuario extends Model
{
    public $timestamps = false;
    protected $table = 'token_usuario';
    protected $primaryKey = "token_usuario_id";


}
