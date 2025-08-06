<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
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
        if(Auth::check())
        {
           
          if(Auth::user()->role == 'Admin') // 1 = Admin
            {
             return $next($request);
            
            }
          else
            {
              return redirect()->back()->with('error','You Are Not Admin');
            }
        }
        else {
            # code...
            return redirect('/auth/login')->with('error','Login To Access The Website Info');
        }
    }
}
