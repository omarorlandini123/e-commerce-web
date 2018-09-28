<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Empresa;

class Usuario extends Model
{
    public $timestamps = false;
    protected $table = 'usuario';
    protected $primaryKey = "usuario_id";

    public function tokens(){
        return $this->belongsToMany(
            "App\Token",
            'token_usuario',
            "usuario_usuario_id","token_token_id")
            ->withPivot(
                'token_usuario_fecha_upd',
                'token_usuario_activo');
    }
    
    public function empresas(){
        return $this->hasMany('App\Empresa','usuario_id','usuario_id');        
    }
   
}
