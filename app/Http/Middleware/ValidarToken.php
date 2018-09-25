<?php

namespace App\Http\Middleware;

use Closure;
use App\Token;
use App\Error;
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

        $token_var=Token::where('token',$token)->first();

        if($token_var==null || count($token_var)==0){
            return Error::getError(5);
        }
        
        return $next($request);
    }

}
