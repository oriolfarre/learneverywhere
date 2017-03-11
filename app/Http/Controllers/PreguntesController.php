<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Preguntes;
use App\Respostes;
use Laracasts\Flash\FlashServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Image;
use Session;
use Cookie;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\User;

session_start();
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
       $checkbox = $request->input('verifica');
       // --- INICI CONTROL CAPTCHA
       $data = Input::all();
  	   $rules = array(
  			'g-recaptcha-response' => 'required|captcha',
  		  );
       $validator = Validator::make($data, $rules);
  		 if ($validator->fails()){ //Si el control es incorrecte no entrarà la imatge.
  		   flash("Verifica el captcha.", 'danger');
         return redirect('/preguntes');
  		 }
       else { //Si el CAPTCHA es vàlid passa a fer el control pertinent.
      // --- FI CONTROL CAPTCHA

            //  if ($nivell=="" || $pregunta=="" || $descripcio=="" || $imatge=="" || $respostaCorrecte=="" || $respostaIncorrecte1==""){
            if ($pregunta=="" || $descripcio=="" || $imatge=="" || $respostaCorrecte=="" || $respostaIncorrecte1==""){

               flash("No s'ha afegit la pregunta, comprova que els camps obligatoris són correctes.", 'danger');

               return redirect('/preguntes');
             }
             else if ($pregunta!="" && $descripcio!="" && $imatge!="" && $respostaCorrecte!="" && $respostaIncorrecte1!="" && $checkbox!="accept"){

               flash("Per afegir la pregunta has d'acceptar les nostres condicions.", 'danger');

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
               if ($respostaIncorrecte2!="" && $respostaIncorrecte3!="")
               {
                 DB::table('respostes')->insert
                 (
                    ['resposta' => $respostaIncorrecte2, 'id_pregunta' => $id, 'correcte' => 'no']
                 );
                 DB::table('respostes')->insert
                 (
                    ['resposta' => $respostaIncorrecte3, 'id_pregunta' => $id, 'correcte' => 'no']
                 );
               }
               else if($respostaIncorrecte2!=""){
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

    }

    public function list(){

      $preguntes = Preguntes::all();
      // No retornar vista
      return view('activitats/activitats', compact('preguntes'));

    }

    //Obtenir id de pregunta automaticament i anar pasant
    // public function show_pregunta($id){
    //
    //   $pregunta = Preguntes::all()->where('id_pregunta', $id);
    //   $respostes =Respostes::all()->where('id_pregunta', $id);
    //   return view('activitats/pregunta', compact('pregunta','respostes'));
    //
    // }



    /*
      Obtenim les preguntes segons el nivell seleccionat utilitzant scopes
    */

    public function getPreguntes($nivell){

      if($nivell === '1'){
        $preguntes = Preguntes::GetPreguntesNivell1()->get();
        $_SESSION['preguntes'] = $preguntes;
        $_SESSION['count'] = 0;
        if(!isset($_SESSION['score']) || ($_SESSION['score'] >= 100) || ($_SESSION['score'] <= 0)){
            $_SESSION['score'] = 50;
        }
        //return redirect('/activitat');
        return $this->getRespostes();


      }
      elseif($nivell === '2'){
        $preguntes = Preguntes::GetPreguntesNivell2()->get();
        $_SESSION['preguntes'] = $preguntes;
        $_SESSION['count'] = 0;
        if(!isset($_SESSION['score']) || ($_SESSION['score'] >= 100) || ($_SESSION['score'] <= 0)){
            $_SESSION['score'] = 40;
        }

        return $this->getRespostes();
      }
      elseif($nivell === '3'){
        $preguntes = Preguntes::GetPreguntesNivell3()->get();
        $_SESSION['preguntes'] = $preguntes;
        $_SESSION['count'] = 0;
        if(!isset($_SESSION['score']) || ($_SESSION['score'] >= 100) || ($_SESSION['score'] <= 0)){
            $_SESSION['score'] = 30;
        }

        return $this->getRespostes();

      }


    }

    public function getRespostes(){
      // Obtenim la id de la pregunta i busquem les respostes

      $id_pregunta = $_SESSION['preguntes'][$_SESSION['count']]['id_pregunta'];

      $respostes = Respostes::where('id_pregunta', $id_pregunta)
                  ->inRandomOrder()
                  ->get();
      // Tenim les respostes, hem de fer un return a la vista activitat
      //dd($respostes);
      return view('activitats/activitat', compact('respostes'));
    }

    public function comprove(){
      $id_resposta = Request()->all();

      $compare = Respostes::where('id_resposta',$id_resposta["resposta"])
                ->inRandomOrder()
                ->get();

      // $id_pregunta = $compare[0]['id_pregunta'];

      foreach ($compare as $comp){
          if($comp->correcte == 'si'){
              // SI ES CORRECTE
              if($_SESSION['preguntes'][0]['nivell'] == 1){
                $_SESSION['score'] = $_SESSION['score'] + 10;
              }
              elseif($_SESSION['preguntes'][0]['nivell'] == 2){
                $_SESSION['score'] = $_SESSION['score'] + 8;
              }
              elseif($_SESSION['preguntes'][0]['nivell'] == 3){
                $_SESSION['score'] = $_SESSION['score'] + 5;
              }

          }
          else{
            // SI ES INCORRECTE
            if($_SESSION['preguntes'][0]['nivell'] == 1){
              $_SESSION['score'] = $_SESSION['score'] - 10;
            }
            elseif($_SESSION['preguntes'][0]['nivell'] == 2){
              $_SESSION['score'] = $_SESSION['score'] - 15;
            }
            elseif($_SESSION['preguntes'][0]['nivell'] == 3){
              $_SESSION['score'] = $_SESSION['score'] - 20;
            }

          }
      }

      if($_SESSION['score'] >= 100){
          //dd($_SESSION['preguntes'][0]['nivell']);
          if($_SESSION['preguntes'][0]['nivell'] == 1)
            $final_score = 10;
          elseif ($_SESSION['preguntes'][0]['nivell'] == 2)
            $final_score = 20;
          elseif ($_SESSION['preguntes'][0]['nivell'] == 3)
            $final_score = 30;

          if (Auth::check()) {
              // The user is logged in...
              $user_id = \Auth::id();

              $actual_score = Auth::user()->punts;
              $user = User::find($user_id);
              $actual_score = $actual_score + $final_score;
              $user->punts = $actual_score;
              $user->save();

              return view('activitats/congratulations',compact('final_score'));

          }
          else{
              return view('activitats/outcongratulations');
          }

      }
      elseif ($_SESSION['score'] <= 0) {
        return view('activitats/perdut');
      }{

      }

      $_SESSION['count'] = $_SESSION['count'] + 1;
      if(count($_SESSION['preguntes']) > $_SESSION['count']){

        //id de la próxima pregunta
        $id_pregunta = $_SESSION['preguntes'][$_SESSION['count']]['id_pregunta'];
        // respostes de la pregunta
        $respostes = Respostes::where('id_pregunta', $id_pregunta)
                    ->inRandomOrder()
                    ->get();

        return view('activitats/activitat', compact('respostes'));
      }

      else{
        // Quan s'acaben les preguntes, tornem a l'inici
        $nivell = $_SESSION['preguntes'][0]['nivell'];
        return redirect('nivell/' . $nivell);
      }

    }

    /*public function sessionRestart(){
      dd('asdasd');
      $_SESSION['score'] = 0;
    }*/


}
