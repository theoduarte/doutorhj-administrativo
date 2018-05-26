<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Perfiluser extends Model
{
	use Sortable;
	
	protected $fillable = ['titulo', 'descricao', 'tipo_permissao'];
	
	public $sortable = ['id', 'titulo', 'tipo_permissao'];
	
	public function users()
	{
		return $this->hasMany('App\User');
	}
	
	public function permissaos()
	{
		return $this->belongsToMany('App\Permissao');
	}
	
	public function menus()
	{
	    return $this->belongsToMany('App\Menu');
	}
}
