<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TermosCondicoes extends Model
{
    protected $fillable = ['dt_inicial', 'dt_final', 'ds_termo'];

    public function setDtInicialAttribute($value)
    {
        if (empty($value)){
            return;
        }
        
        $this->attributes['dt_inicial'] = Carbon::createFromFormat('d/m/Y', $value)->toDatetimeString();
    }

    public function setDtFinalAttribute($value)
    {
        if (empty($value)){
            return;
        }
        
        $this->attributes['dt_final'] = Carbon::createFromFormat('d/m/Y', $value)->toDatetimeString();
    }

    public function getDtInicialAttribute($value) {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function getDtFinalAttribute($value) {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
