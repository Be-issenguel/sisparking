<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = "tipos";

    protected $fillable = ["descricao"];

    public function cajones()
    {
        return $this->hasMany(Cajon::class);
    }

    public function tarifas()
    {
        return $this->hasMany(Tarifa::class);
    }
}
