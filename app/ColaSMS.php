<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColaSMS extends Model
{
    public $timestamps = false;
    protected $table = 'cola_sms';
    protected $primaryKey = "cola_sms_id";
    
}
