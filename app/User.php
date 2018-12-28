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
    protected $fillable = ['name', 'email', 'password', 'tp_user', 'cs_status', 'perfiluser_id'];
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

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function representante()
	{
		return $this->hasOne('App\Representante');
	}

    public function registro_logs()
    {
        return $this->hasMany('App\RegistroLog');
    }
    
    public function mensagems(){
    	return $this->hasMany('App\Mensagem', 'remetente_id');
    }
    
    public function destinatarios(){
    	return $this->hasMany('App\MensagemDestinatario', 'destinatario_id');
    }

	public function getCelular()
	{
		$representante = $this->representantes->first();
		if(!is_null($representante)) {
			$contato = $representante->contatos()->where('tp_contato', 'CP')->first();
			if(!is_null($contato)) return $contato->ds_contato;
		}

		$paciente = $this->pacientes->first();
		if(!is_null($paciente)) {
			$contato = $paciente->contatos()->where('tp_contato', 'CP')->first();
			if(!is_null($contato)) return $contato->ds_contato;
		}

		$profissional = $this->profissionals->first();
		if(!is_null($profissional)) {
			$contato = $profissional->contatos()->where('tp_contato', 'CP')->first();
			if(!is_null($contato)) return $contato->ds_contato;
		}

		return null;
	}

	public static function validaUsuario($email)
	{
		$user = User::where('email', $email)->where('cs_status', 'A')->get();

		if($user->count() != 0) {
			return false;
		}

		return true;
	}
}