<?php

namespace App\Http\Middleware;

use Closure;

class Goto
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
      // if ($request) {
      //     return 'aaaa';
      // }
        return $next($request);
    }
}
