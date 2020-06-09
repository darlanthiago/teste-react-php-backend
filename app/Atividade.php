<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    public function projeto()
    {
        return $this->belongsTo('App\Projeto');
    }
}
