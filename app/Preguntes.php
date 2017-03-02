<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preguntes extends Model
{
    protected $fillable = [
        'pregunta', 'descripcio', 'imatge', 'estat'
    ];
}
