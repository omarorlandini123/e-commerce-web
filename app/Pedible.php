<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedible extends Model
{
    public $timestamps = false;
    protected $table = 'pedibles';

    public function producto()
    {        
        return $this->belongsTo('App\Producto', 'producto_id', 'pedible_id');        
    }

    public function afiche()
    {
        return $this->belongsTo('App\Afiche', 'producto_id', 'pedible_id');
    }
}
