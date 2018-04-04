<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use Notifiable;
    use Sortable;
    
    public $sortable  = ['id', 'name', 'email', 'tp_user', 'cs_status', 'perfiluser_id'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'tp_user', 'cs_status'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
    
    
    /*
     * CS_STATUS
     */
    const ATIVO   = 'A';
    const INATIVO = 'I';
    
    protected static $cs_status = array(
        self::ATIVO   => 'Ativo',
        self::INATIVO => 'Inativo',
    );
    
    
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
    
    public function getCsStatusAttribute($cdStatus) {
        return static::$cs_status[$cdStatus];
    }
}