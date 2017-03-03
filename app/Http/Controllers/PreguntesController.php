<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Preguntes;
use App\Respostes;
use Laracasts\Flash\FlashServiceProvider;
use Image;

class PreguntesController extends Controller
{
    public function novaPregunta(Request $request) {
       $nivell = $request->input('nivell');
       $pregunta = $request->input('pregunta');
       $descripcio = $request->input('descripcio');
       $imatge = $request->file('imatge');
       $respostaCorrecte = $request->input('resposta_correcte');
       $respostaIncorrecte1 = $request->input('resposta_incorrecte1');
       $respostaIncorrecte2 = $request->input('resposta_incorrecte2');
       $respostaIncorrecte3 = $request->input('resposta_incorrecte3');

      //  dd($request->pregunta, $request->descripcio, $request->resposta_correcte, $request->resposta_incorrecte1, $request->imatge);
      //  dd($pregunta, $descripcio, $respostaCorrecte, $respostaIncorrecte1, $imatge);
       if ($nivell=="" || $pregunta=="" || $descripcio=="" || $imatge=="" || $respostaCorrecte=="" || $respostaIncorrecte1==""){
      // if ($pregunta=="" || $descripcio=="" || $imatge=="" || $respostaCorrecte=="" || $respostaIncorrecte1==""){

         flash("No s'ha afegit la pregunta, comprova que els camps obligatoris són correctes.", 'danger');

         return redirect('/preguntes');
       }
       else {

         if($request->hasFile('imatge')){
           $filename = time() . '.' . $imatge->getClientOriginalExtension();
           Image::make($imatge)->resize(300,300)->save(public_path('uploads/imatges/' . $filename));

         //Afegim les dades de la pregunta a la taula Preguntes.
         $id = DB::table('preguntes')->insertGetId
         (
            ['pregunta' => $pregunta, 'descripcio' => $descripcio, 'imatge' => $filename, 'estat' => 0, 'nivell' => $nivell]
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



          flash("Pregunta afegida correctament. La seva pregunta està pendent de revisió, si és correcte, s'aprovarà en les següents hores.", 'success');
           return redirect('/preguntes');
         }

       }

    }

    public function list(){

      $preguntes = Preguntes::all();
      // No retornar vista
      return view('activitats/activitats', compact('preguntes'));

    }

    //Obtenir id de pregunta automaticament i anar pasant
    public function show_pregunta($id){

      $pregunta = Preguntes::all()->where('id_pregunta', $id);
      $respostes =Respostes::all()->where('id_pregunta', $id);
      return view('activitats/pregunta', compact('pregunta','respostes'));

    }

    public function comprove(){
      $id_resposta = Request()->all();
      $compare = Respostes::all()->where('id_resposta',$id_resposta["resposta"]);

      $id_pregunta = $compare[0]['id_pregunta'];

      //No retornar vista i fer la comprovació directament al controller, després pasar la puntuació per la barra d'energia



      return view('activitats/resolution',compact('compare'));
    }

    /*
      Obtenim les preguntes segons el nivell seleccionat utilitzant scopes
    */

    public function getPreguntes($nivell){
      if($nivell === '1'){
        $preguntes = Preguntes::GetPreguntesNivell1()->get();
        dd($preguntes);
      }
      elseif($nivell === '2'){
        $preguntes = Preguntes::GetPreguntesNivell2()->get();
        dd($preguntes);
      }
      elseif($nivell === '3'){
        $preguntes = Preguntes::GetPreguntesNivell3()->get();
        dd($preguntes);
      }


    }


}
