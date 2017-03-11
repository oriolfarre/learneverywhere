<?php
// session_start();
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <h1>Activitat</h1>

        <h2> {{ $_SESSION['preguntes'][$_SESSION['count']]['pregunta'] }}<h2>


          <form action="{{ url('resolution') }}">
          @foreach($respostes as $resposta)
            <input required type="radio" name="resposta" value="{{$resposta -> id_resposta}}">{{$resposta -> resposta}}<br>
          @endforeach

          <input type="submit" name="">
          </form>


          <div class="progress">
            <div class="progress-bar {{ $_SESSION['score'] < 30 ? 'progress-bar-danger' : null}} progress-bar-striped active" role="progressbar"
            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$_SESSION['score']}}%">
            </div>
          </div>
  </div>
</div>
@endsection
