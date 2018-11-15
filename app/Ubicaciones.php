<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubicaciones extends Model
{
    public $timestamps = false;
    protected $table = 'ubicaciones';
    protected $primaryKey = "id";

}
