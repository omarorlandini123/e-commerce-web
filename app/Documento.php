<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;
class Documento extends Model
{
    public $timestamps = false;
    protected $table = 'documento';
    protected $primaryKey = "documento_id";

    public function usuario(){
        return $this->belongsTo('App\Usuario','usuario_id','usuario_id');
    }
}
