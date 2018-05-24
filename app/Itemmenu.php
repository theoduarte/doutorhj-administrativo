<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Itemmenu extends Model
{
	use Sortable;
	
	protected $fillable = ['titulo', 'url', 'ic_item_class', 'ordemexibicao', 'menu_id'];
	
	public $sortable = ['id', 'titulo', 'ic_item_class', 'ordemexibicao', 'menu_id'];
	
	public function menu()
	{
		return $this->belongsTo('App\Menu');
	}
}
