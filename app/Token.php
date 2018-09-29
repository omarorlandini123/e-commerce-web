<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    public $timestamps = false;
    protected $table = 'token';
    protected $primaryKey = "token_id";

    public function token_usuario(){
        return $this->hasMany('App\TokenUsuario','token_token_id','token_id');      
    }

   

}
