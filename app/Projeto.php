<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    public function atividade()
    {
        return $this->hasMany('App\Atividade');
    }
}
