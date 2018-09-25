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

       
        
        return $next($request);
    }

}
