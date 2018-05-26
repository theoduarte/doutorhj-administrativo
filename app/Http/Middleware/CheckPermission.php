<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PermissaoController;

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
    	
    	$has_permission = FALSE;
    	$user_session = Auth::user();
    	$permissao = new PermissaoController();
    	
    	$has_permission = $permissao->hasPermissao($user_session, $action_name);
        
    	if (!$has_permission) {
    	    return redirect('/home')->with('error-alert', 'Área restrita. Permissão de acesso negada.');
        }
        
        return $next($request);
    }
}
