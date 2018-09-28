<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;
use App\Almacen;

class Empresa extends Model
{
    public $timestamps = false;
    protected $table = 'empresa';
    protected $primaryKey = "empresa_id";

    public function usuario(){
        return $this->belongsTo("App\Usuario","usuario_id","usuario_id");
    }

    public function almacenes(){
        return $this->hasMany('App\Almacen','empresa_id','empresa_id');        
    }

}
