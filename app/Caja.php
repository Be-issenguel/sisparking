<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    //
    public $table = 'cajas';
    protected $fillable = ['montante','descricao','comprovante','tipo','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
