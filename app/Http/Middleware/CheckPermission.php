<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $action_name)
    {
        dd($action_name);
        
        if ($action_name == 'cargos') {
            //return redirect('/home');
        }
        
        return $next($request);
    }
}
