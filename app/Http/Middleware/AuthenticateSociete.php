<?php

namespace App\Http\Middleware;

use Closure;

//Auth Facade
use Auth;

class AuthenticateSociete
{
   public function handle($request, Closure $next)
   {
       //If request does not comes from logged in seller
       //then he shall be redirected to Seller Login page
       if (! Auth::guard('web_societe')->check()) {
           return redirect('/');
       }

       return $next($request);
   }
}
