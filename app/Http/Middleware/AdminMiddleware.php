<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

          if (Auth::check()) {
            if (Auth::user()->role == "admin") {
                return $next($request);
            }
            elseif (auth()->user()->role == "student") {
              return redirect("/student")->with("msg","Access denied due to You Are not Admin");
            }else {
              return redirect("/home")->with("msg","Access denied due to You Are not Admin");
            }  
            
          }else {
            return redirect("/login")->with("msg","login to access this website");
                
          }


        // return $next($request);
    }
}
