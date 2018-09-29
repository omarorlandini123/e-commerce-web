<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenUsuario extends Model
{
    public $timestamps = false;
    protected $table = 'token_usuario';
    protected $primaryKey = "token_usuario_id";


    public function usuario(){
        return $this->belongsTo("App\Usuario","usuario_usuario_id","usuario_id");
    }

    public function token(){
        return $this->belongsTo("App\Token","token_token_id","token_id");
    }

}
