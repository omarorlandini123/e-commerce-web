<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedible extends Model
{
    public $timestamps = false;
    protected $table = 'pedibles';

    public function producto()
    {
        
            return $this->belongsTo('App\Producto', 'producto_id', 'pedible_id')->where('tipo_pedible',1);
        
    }

    public function afiche()
    {
        return $this->belongsTo('App\Producto', 'producto_id', 'pedible_id')->where('tipo_pedible',2);
    }
}
