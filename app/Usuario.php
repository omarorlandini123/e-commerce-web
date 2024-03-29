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
   
    public function documentos(){
        return $this->hasMany('App\Documento','usuario_id','usuario_id');      
    }

    public function comprador(){
        return $this->hasMany('App\Comprador','usuario_id', 'usuario_id');
    }

    public function freeler(){
        return $this->hasMany('App\Freeler','usuario_id','usuario_id');
    }

    public function administrador(){
        return $this->hasMany('App\Administrador','usuario_id','usuario_id');
    }

    public function ubicacion(){
        return $this->belongsTo('App\Ubicacion','id_ubicacion','id_ubicacion');
    }

    public function nombre_completo(){
        return $this->usuario_apellidoPa. " " .$this->usuario_apellidoMa.", ". $this->usuario_nombre;
    }
   
}
