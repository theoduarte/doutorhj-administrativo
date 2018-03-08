<?php
namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;

use App\Menu;

class MenuComposer
{
	protected $menus;

	public function __construct(Menu $menus)
	{
		$this->$menus = $menus;
	}

	public function compose(View $view)
	{
//  		$view->with('menus_app', Menu::with('itemmenus')->get());
	    $view->with('menus_app', Menu::all()->load('itemmenus'));
//  		$view->with('menus_app', DB::table('menus')->get());
// 		$view->with('itemmenus', $this->itemmenus->lists('ordemexibicao', 'ic_item_class', 'url', 'titulo', 'id'));
	}
}