<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

/**
 * @property int $id
 * @property int $plano_id
 * @property string $titulo
 * @property string $ds_servico
 * @property boolean $cs_status
 * @property string $created_at
 * @property string $updated_at
 * @property Plano $plano
 */
class ServicoAdicional extends Model
{

  use Sortable;

  public $sortable = ['id', 'titulo', 'plano_id', 'created_at', 'updated_at'];
  protected $fillable = ['plano_id', 'titulo', 'ds_servico', 'cs_status', 'created_at', 'updated_at'];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function plano()
  {
    return $this->belongsTo('App\Plano');
  }


}
