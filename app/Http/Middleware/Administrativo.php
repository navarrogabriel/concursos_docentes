<?php

namespace App\Http\Middleware;

use Closure;

class Administrativo
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
      if ( \Auth::user()->rol != 'Administrativo' )
        {
          return redirect('errors/500');
        }
      return $next($request);
    }
}
