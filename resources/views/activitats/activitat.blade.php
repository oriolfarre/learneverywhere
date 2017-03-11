<?php
// session_start();
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Pregunta de nivell {{ $_SESSION['preguntes'][$_SESSION['count']]['nivell'] }}</h1>

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
