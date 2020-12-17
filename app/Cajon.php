<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cajon extends Model
{
    public $table = 'cajones';

    protected $fillable = ['descricao','status','tipo_id'];

    public function tipo()
    {
        return $this->belongsTo(Tipo::class);
    }
}
