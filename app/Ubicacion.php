<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    public $timestamps = false;
    protected $table = 'ubicacion';
    protected $primaryKey = "id_ubicacion";
    

}
