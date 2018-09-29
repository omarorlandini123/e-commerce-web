<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UsuarioEmpresa;
use App\Almacen;

class Empresa extends Model
{
    public $timestamps = false;
    protected $table = 'empresa';
    protected $primaryKey = "empresa_id";

    public function usuario_empresa(){
        return $this->hasMany("App\UsuarioEmpresa","empresa_id","empresa_id");
    }

    public function almacenes(){
        return $this->hasMany('App\Almacen','empresa_id','empresa_id');        
    }

}
