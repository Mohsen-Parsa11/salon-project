<?php

namespace App\Http\Middleware;
use Session;
use App;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class changeLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         if(Session::get('change_language')){
            App::setlocale(Session::get('change_language'));
        }
      return $next($request);       
    }
}
