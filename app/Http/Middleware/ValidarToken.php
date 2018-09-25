<?php

namespace App\Http\Middleware;

use Closure;
use App\Token;
class ValidarToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$token)
    {
        if(!isValido($token)){
            return Error::getError(5);
        }
        return $next($request);
    }

    public function isValido($token){
        $token_var=Token::where('token',$token)->first();
        if($token_var==null || count($token_var)==0){
            return false;
        }
        return true;
    }
}
