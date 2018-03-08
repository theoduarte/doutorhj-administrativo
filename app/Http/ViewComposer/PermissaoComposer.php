<?php
namespace App\Http\ViewComposer;

use Illuminate\Contracts\View\View;
use Illuminate\Routing\Route;

use App\Menu;

class PermissaoComposer
{
	protected $menus;

	public function __construct(Menu $menus)
	{
		$this->$menus = $menus;
	}

	public function compose(View $view)
	{
		$can_access = FALSE;
		$action = \Route::current();
		//echo "<script>console.log( 'Model action: " .$action->uri . " Controller action: ".$action->action['as']."' );</script>";
		
		if (isset($action->uri) && $action->uri == 'home') {
			$can_access = TRUE;
		}
		
		if(!$can_access) {
			//return redirect()->route('home')->with('error', 'Acesso Negado!');
		}
		
	    $view->with('can_access', $can_access);
	}
}