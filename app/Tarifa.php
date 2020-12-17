<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarifa extends Model
{
    public $table = 'tarifas';
    protected $fillable = ['tempo','descricao','custo','hierarquia','tipo_id'];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
}
