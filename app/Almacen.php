<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Empresa;
use App\ItemAlmacen;

class Almacen extends Model
{
    public $timestamps = false;
    protected $table = 'almacen';
    protected $primaryKey = "almacen_id";

    public function empresa()
    {
        return $this->belongsTo("App\Empresa","empresa_id","empresa_id");
    }

    public function items(){
        return $this->hasMany('App\ItemAlmacen','almacen_id','almacen_id');        
    }

}
