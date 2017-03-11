<?php
// session_start();
?>
@extends('layouts.app')

@section('content')
<div class="container activitat">
  <!-- Modal Ajuda-->
  <div id="ajuda" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1 class="modal-title">Ajuda</h1>
        </div>
        <div class="modal-body">
          <p>Per jugar has de seleccionar un nivell, aquest nivell et portarà a un lloc de la web on t'apareixeran una sèrie de preguntes.</p>
          <p>Segons el nivell seleccionat començaràs amb més o menys vida, que es representa en la barra de puntuació que trobaràs a la part inferior de l'activitat.</p>
          <p>Per completar el nivell aquesta barra haurà d'arribar al 100%, en cas contrari, si arriba a 0% hauràs perdut.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tancar</button>
        </div>
      </div>

    </div>
  </div>
  <!--Final Modal-->

    <div class="row">
      <div class="col-md-12">
        <h1>Pregunta de nivell {{ $_SESSION['preguntes'][$_SESSION['count']]['nivell'] }}</h1> <!-- Botó Ajuda Modal-->
        <button type="button" class="btn btn-warning btn-circle btn-lg fa fa-question-circle pull-right" data-toggle="modal" data-target="#ajuda"></button>
        <!-- <button type="button" class="btn btn-warning btn-circle btn-lg fa fa-question-circle pull-right"><i class="glyphicon glyphicon-remove"></i></button> -->
        <!-- Fi Botó Ajuda Modal-->

        <h2> {{ $_SESSION['preguntes'][$_SESSION['count']]['pregunta'] }} <h2>
      </div>

      <div class="col-md-4">

          <form action="{{ url('resolution') }}">
          @foreach($respostes as $resposta)
            <!-- <label>
              <input required type="radio" class="option-input checkbox" name="resposta" value="{{$resposta -> id_resposta}}">{{$resposta -> resposta}}
            </label> -->
            <div class="radioBtn">
              <li>
                <input required type="radio" id="{{$resposta -> id_resposta}}" name="resposta" value="{{$resposta -> id_resposta}}">
                <label for="{{$resposta -> id_resposta}}">{{$resposta -> resposta}}</label>

                <div class="check"><div class="inside"></div></div>
              </li>
            </div>
          @endforeach

          <input type="submit" class="btn btn-success btn-lg" name="Comprova" value="Enviar resposta!">
          </form>
      </div>

      <div class="col-md-6 pull-right">
        <img src="../uploads/imatges/{{ $_SESSION['preguntes'][$_SESSION['count']]['imatge'] }}" height="300" width="300" alt="imatge de la pregunta">
      </div>
      <div class="col-md-12">
          <span class="life"><h1>Life Bar!</h2></span>
          <div class="progress">
            <div class="progress-bar {{ $_SESSION['score'] < 30 ? 'progress-bar-danger' : null}} progress-bar-striped active" role="progressbar"
            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$_SESSION['score']}}%">
            </div>
          </div>
      </div>
  </div>
</div>
@endsection
