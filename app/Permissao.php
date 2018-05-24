<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Permissao extends Model
{
	use Sortable;
	
	protected $fillable = ['titulo', 'acesso_privado', 'codigo_permissao', 'url_action', 'url_model', 'descricao'];
	
	public $sortable = ['id', 'titulo', 'url_action', 'url_model'];
	
	public function perfilusers()
	{
		return $this->belongsToMany('App\Perfiluser');
	}
}
