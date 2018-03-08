<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Menu extends Model
{
	use Sortable;
	
	protected $fillable = ['titulo', 'descricao', 'ic_menu_class'];
	
	public $sortable = ['id', 'titulo', 'descricao', 'ic_menu_class'];
	
	public function itemmenus()
	{
		return $this->hasMany('App\Itemmenu');
	}
	
	 public function menu_perfilusers()
	 {
	 	return $this->belongsToMany('App\Perfiluser');
	 }
}
