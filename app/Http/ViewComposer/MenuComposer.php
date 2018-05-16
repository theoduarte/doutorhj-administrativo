<?php
namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;

use App\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MenuComposer
{
	protected $menus;

	public function __construct(Menu $menus)
	{
		$this->$menus = $menus;
	}

	public function compose(View $view)
	{
// 	    $user_session = Auth::user();
// 	    $user_id = $user_session->id;
	    
// 	    $menus_app = Menu::with('itemmenus')
// 	    ->join('menu_perfiluser', function($join1) { $join1->on('menus.id', '=', 'menu_perfiluser.menu_id');})
// 	    ->join('perfilusers', function($join2) { $join2->on('menu_perfiluser.perfiluser_id', '=', 'perfilusers.id');})
// 	    ->join('users', function($join3) use($user_id) { $join3->on('perfilusers.id', '=', 'users.perfiluser_id')->on('users.id', '=', DB::raw($user_id));})
// 	    ->select('menus.*', 'menus.id', 'menus.titulo')
// 	    ->get();

	    $menus_app = Session::get('menus_app');
	    
// 	    $options = array();
// 	    $options['joins'] = array(
// 	        array('table' => 'zigncom_menus_zigncom_perfilusers', 'alias' => 'MenuProf', 'type' => 'inner', 'conditions' => array( 'ZigncomMenu.id = MenuProf.zigncom_menu_id')),
// 	        array('table' => 'zigncom_perfilusers', 'alias' => 'Profs', 'type' => 'inner', 'conditions' => array( 'MenuProf.zigncom_perfiluser_id = Profs.id')),
// 	        array('table' => 'users', 'alias' => 'Users', 'type' => 'inner', 'conditions' => array( 'Profs.id = Users.zigncom_perfiluser_id AND Users.id = '.$user_id))
// 	    );
	    
//  		$view->with('menus_app', Menu::with('itemmenus')->get());
// 	    $view->with('menus_app', Menu::all()->load('itemmenus'));
	    $view->with('menus_app', $menus_app);
//  		$view->with('menus_app', DB::table('menus')->get());
// 		$view->with('itemmenus', $this->itemmenus->lists('ordemexibicao', 'ic_item_class', 'url', 'titulo', 'id'));
	}
}