<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    public $timestamps = false;
    protected $table = 'documento';
    protected $primaryKey = "documento_id";

    
}
