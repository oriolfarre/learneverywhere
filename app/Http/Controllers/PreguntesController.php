<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Preguntes;
use App\Respostes;

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
       $respostaIncorrecte3 = $request->input('resposta_incorrecte3');

       if ($nivell=="" || $pregunta=="" || $descripcio=="" || $imatge=="" || $respostaCorrecte=="" || $respostaIncorrecte1==""){

         return redirect('/preguntes');
       }
       else {

         //Afegim les dades de la pregunta a la taula Preguntes.
         $id = DB::table('preguntes')->insertGetId
         (
            ['pregunta' => $pregunta, 'descripcio' => $descripcio, 'imatge' => $imatge, 'estat' => 0]
         );

         //Ara afegim les dades de les repostes a la taula Respostes. Aprofitem la variable $id que agafa l'id de la pregunta per fer la relació a la pregunta.
         DB::table('respostes')->insert
         (
            ['resposta' => $respostaCorrecte, 'id_pregunta' => $id, 'correcte' => 'si']
         );
         //Afegim ara les respostes incorrectes.
         DB::table('respostes')->insert
         (
            ['resposta' => $respostaIncorrecte1, 'id_pregunta' => $id, 'correcte' => 'no']
         );
         //Respostes incorrectes opcionals
         if ($respostaIncorrecte2!="")
         {
           DB::table('respostes')->insert
           (
              ['resposta' => $respostaIncorrecte2, 'id_pregunta' => $id, 'correcte' => 'no']
           );
         }
         else if ($respostaIncorrecte3!="")
         {
           DB::table('respostes')->insert
           (
              ['resposta' => $respostaIncorrecte3, 'id_pregunta' => $id, 'correcte' => 'no']
           );
         }

         return redirect('/home');
       }

      //  echo $pregunta, $descripcio, $imatge, $nivell, $respostaCorrecte, $respostaIncorrecte1;
    }

    public function list(){

      $preguntes = Preguntes::all();
      return view('activitats/activitats', compact('preguntes'));

    }

    public function show_pregunta($id){

      $pregunta = Preguntes::all()->where('id_pregunta', $id);
      $respostes =Respostes::all()->where('id_pregunta', $id);
      return view('activitats/pregunta', compact('pregunta','respostes'));

    }

    public function comprove(){
      $id_resposta = Request()->all();
      $compare = Respostes::all()->where('id_resposta',$id_resposta["resposta"]);

      $id_pregunta = $compare[0]['id_pregunta'];
  
      return view('activitats/resolution',compact('compare'));
    }
}
