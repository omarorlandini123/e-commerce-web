<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TokenUsuario;
use App\UsuarioEmpresa;
use App\Documento;

class Usuario extends Model
{
    public $timestamps = false;
    protected $table = 'usuario';
    protected $primaryKey = "usuario_id";

    public function token_usuario(){
        return $this->hasMany('App\TokenUsuario','usuario_usuario_id','usuario_id');      
    }
    public function usuario_empresa(){
        return $this->hasMany('App\UsuarioEmpresa','usuario_id','usuario_id');      
    }
    public function documento(){
        return $this->hasMany('App\Documento','usuario_id','usuario_id');      
    }
   
}
