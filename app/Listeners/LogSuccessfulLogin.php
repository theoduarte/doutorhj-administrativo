<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        //dd($event->user->User->nome);
        //$nome = $event->user->nome;
        $user_id = $event->user->id;
        
        $menus_app = Menu::with('itemmenus')
        ->join('menu_perfiluser', function($join1) { $join1->on('menus.id', '=', 'menu_perfiluser.menu_id');})
        ->join('perfilusers', function($join2) { $join2->on('menu_perfiluser.perfiluser_id', '=', 'perfilusers.id');})
        ->join('users', function($join3) use($user_id) { $join3->on('perfilusers.id', '=', 'users.perfiluser_id')->on('users.id', '=', DB::raw($user_id));})
        ->select('menus.*', 'menus.id', 'menus.titulo')
        ->get();
        
        //dd($menus_app);
        Session::put('menus_app', $menus_app);
    }
}
