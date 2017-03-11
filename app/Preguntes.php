<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preguntes extends Model
{
    protected $table = 'preguntes';

    protected $fillable = [
        'pregunta', 'descripcio', 'imatge', 'estat'
    ];

    /*
    Consulta per obtenir preguntes segons el nivell
    */

    public function scopeGetPreguntesNivell1($query){
        return $query->where('nivell','1')
                ->where('estat','1')
                ->inRandomOrder()
                ->limit(50);
    }

    public function scopeGetPreguntesNivell2($query){
        return $query->where('nivell','2')
                ->where('estat','1')
                ->inRandomOrder()
                ->limit(50);
    }

    public function scopeGetPreguntesNivell3($query){
        return $query->where('nivell','3')
                ->where('estat','1')
                ->inRandomOrder()
                ->limit(50);
    }
}
