<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respostes extends Model
{
    protected $fillable = [
        'resposta', 'id_pregunta', 'correcte',
    ];
}
