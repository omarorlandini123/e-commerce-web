<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedibleDisponible extends Model
{
    public $timestamps = false;
    protected $table = 'PediblesDisponibles';

    public function producto()
    {        
        return $this->belongsTo('App\Producto',  'pedible_id','producto_id');      
    }

    public function afiche()
    {
        return $this->belongsTo('App\Afiche', 'pedible_id','afiche_id');
    }
}
