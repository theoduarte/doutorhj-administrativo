<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Sortable;
    
    
    
    public $sortable  = ['id', 'name', 'email', 'tp_user', 'cs_status', 'perfiluser_id'];

    protected $fillable = ['name', 'email', 'password', 'tp_user', 'cs_status'];

    protected $hidden = ['password', 'remember_token'];
    
    
    
    /*
     * Constants
     */
    const ATIVO   = 'A';
    const INATIVO = 'I';
    
    protected static $cs_status = array(
        self::ATIVO   => 'Ativo',
        self::INATIVO => 'Inativo'
    );
    
    
    
    /*
     * Relationships
     */
    public function perfiluser()
    {
    	return $this->belongsTo('App\Perfiluser');
    }
    
    public function paciente(){
        return $this->hasOne(Paciente::class);
    }
    
    public function profissional(){
        return $this->hasOne(Profissional::class);
    }
    
    public function responsavel()
    {
        return $this->hasMany('App\Responsavel');
    }
    
    public function registro_logs()
    {
        return $this->hasMany('App\RegistroLog');
    }
}