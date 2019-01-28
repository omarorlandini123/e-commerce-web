<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedible extends Model
{
    public $timestamps = false;
    protected $table = 'pedibles';

    public function producto()
    {
        if ($this->tipo_pedible == 1) {
            return $this->belongsTo('App\Producto', 'producto_id', 'pedible_id');
        } else {
            return null;
        }
    }

    public function afiche()
    {
        if ($this->tipo_pedible == 2) {
            return $this->belongsTo('App\Afiche', 'afiche_id', 'pedible_id');
        } else {
            return null;
        }
    }
}
