<?php

namespace App\Http\Middleware;

use Closure;

class CanEdit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if(auth()->user()->name!='Haris Vodopic')
      {
        return redirect('/');
      }
        return $next($request);
    }
}
