<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedible extends Model
{
    public $timestamps = false;
    protected $table = 'pedibles';

    public function producto()
    {        
        return $this->belongsTo('App\Producto',  'pedible_id','producto_id')->where('pedibles.tipo_pedible',1);        
    }

    public function afiche()
    {
        return $this->belongsTo('App\Afiche', 'pedible_id','afiche_id')->where('pedibles.tipo_pedible',2);  
    }
}
