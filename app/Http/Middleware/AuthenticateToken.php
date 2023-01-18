<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticateToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
	     $token=$request->header('Authentication');

        if (preg_match('/Bearer\s(\S+)/', $token, $matches)) {
		$token=$matches[1];

		if($token=="2489023480239482"){
		  return $next($request);
		}else{
	          return response()->json("Authorization Error",403);
		}
        }
	    
	    
	    
	    
    }
}
