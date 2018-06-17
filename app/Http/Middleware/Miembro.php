<?php

namespace App\Http\Middleware;

use Closure;

class Miembro
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
      if ( \Auth::user()->rol != 'Miembro' )
        {
          return redirect('errors/500');
        }
      return $next($request);
    }
}
