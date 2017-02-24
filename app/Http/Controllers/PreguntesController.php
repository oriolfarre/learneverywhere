<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreguntesController extends Controller
{
    function novaPregunta(Request $request) {
       $nivell = $request->input('nivell');
       $pregunta = $request->input('pregunta');
       $descripcio = $request->input('descripcio');
       $imatge = $request->input('imatge');
       $nivell = $request->input('nivell');
       $respostaCorrecte = $request->input('resposta_correcte');
       $respostaIncorrecte1 = $request->input('resposta_incorrecte1');
       $respostaIncorrecte2 = $request->input('resposta_incorrecte2');
       $respostaInorrecte3 = $request->input('resposta_incorrecte3');

       if ($nivell=="" || $pregunta=="" || $descripcio=="" || $imatge=="" || $respostaCorrecte=="" || $respostaIncorrecte1==""){
         return redirect('/preguntes');
       }
       else {
         return redirect('/home');
       }

      //  echo $pregunta, $descripcio, $imatge, $nivell, $respostaCorrecte, $respostaIncorrecte1;
    }
}
