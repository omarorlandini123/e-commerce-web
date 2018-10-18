<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Compra;
use App\Usuario;
class Comprador extends Model
{
    public $timestamps = false;
    protected $table = 'comprador';
    protected $primaryKey = "comprador_id";

    public function compras(){
        $this->hasMany('App\Compra','comprador_id','comprador_id');
    }

    public function usuario(){
        $this->belongsTo('App\Usuario','usuario_id','usuario_id');
    }

}
