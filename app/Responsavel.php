<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Responsavel extends Model
{
    use Sortable;
    use SoftDeletes;
    
    protected $fillable = ['telefone', 'cpf'];
    
    public $sortable = ['id', 'telefone', 'cpf'];
    
    public function clinica()
    {
        return $this->belongsTo(Clinica::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getCpfAttribute(){
        return \App\Http\Controllers\UtilController::formataCpf($this->attributes['cpf']);
    }

    public function getCreatedAtAttribute() {
        if ( empty($this->attributes['created_at']) ) return;
        
        $date = new Carbon($this->attributes['created_at']);
        return $date->format('d/m/Y H:i:s');
    }

    public function getDeletedAtAttribute() {
        if ( empty($this->attributes['deleted_at']) ) return;

        $date = new Carbon($this->attributes['deleted_at']);
        return $date->format('d/m/Y H:i:s');
    }

    /**
     * Scope a query to only include Clinica's responsibles.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeResponsibles($query)
    {
        $user = Auth::user();

        $responsavel = $user->responsavel;
        $query->where('clinica_id', $responsavel->clinica_id);

        return $query->withTrashed()->where('clinica_id', $responsavel->clinica_id);
    }

    /**
     * Scope a query to only include Clinica's responsibles.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAll($query)
    {
        return $query->withTrashed();
    }
}