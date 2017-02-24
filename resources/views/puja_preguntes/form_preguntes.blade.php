<?php $count=1; ?>
@extends('layout')

@section('content')

<h1>Afegir preguntes</h1>
<br/>
<p>Per afegir correctament la pregunta hauras d'introduir una resposta correcte, i com a mínim, una d'incorrecte. D'incorrectes hi han un màxim de 3 respostes.</p>
<br/><br/>

{!! Form::open(array('')) !!}

<!-- Afegim un desplegable on selecciona el nivell al que fa referència la pregunta -->
<div class="form-group {{ $errors->has('nivell') ? ' has-error' : '' }}">
  <label for="name" class="control-label">Nivell:</label>
    {{ Form::select('nivell', array('1' => '1', '2' => '2', '3' => '3')) }}
</div>

  <!-- Afegim el camp pregunta que es on s'escriurà l'enunciat de la pregunta -->
  <div class="form-group {{ $errors->has('pregunta') ? ' has-error' : '' }}">
    <label for="name" class="control-label">Pregunta:</label>
      {!! Form::text('pregunta', null, ['class' => 'form-control', 'id' => 'pregunta']) !!}
  </div>

  <!-- Afegim el camp descripcio que es on s'escriurà la descripció de la pregunta -->
  <div class="form-group {{ $errors->has('descripcio') ? ' has-error' : '' }}">
    <label for="name" class="control-label">Descripció:</label>
      {!! Form::textarea('descripcio', null, ['class' => 'form-control', 'id' => 'descripcio', 'size' => '30x5']) !!}
  </div>

  <!-- Afegim el camp imatge que es on s'inclourà una imatge a la pregunta (opcional) -->
  <div class="form-group {{ $errors->has('imatge') ? ' has-error' : '' }}">
    <label for="name" class="control-label">Imatge:</label>
      {{ Form::file('imatge', ['class' => 'field']) }}
  </div>

  <!-- Afegim el camp resposta que es on introduirem les possibles repostes per a la pregunta que estem creant -->
  <div class="form-group {{ $errors->has('resposta') ? ' has-error' : '' }}">
    <label for="name" class="control-label">Resposta Correcte:</label>
    {!! Form::text('resposta_correcte', null, ['class' => 'form-control', 'id' => 'resposta']) !!}
  </div>
  <div class="form-group {{ $errors->has('resposta') ? ' has-error' : '' }}">
    <label for="name" class="control-label">Resposta Incorrecte 1:</label>
    {!! Form::text('resposta_incorrecte1', null, ['class' => 'form-control', 'id' => 'resposta']) !!}
  </div>
  <div class="form-group {{ $errors->has('resposta') ? ' has-error' : '' }}">
    <label for="name" class="control-label">Resposta Incorrecte 2:</label>
    {!! Form::text('resposta_incorrecte2', null, ['class' => 'form-control', 'id' => 'resposta']) !!}
  </div>
  <div class="form-group {{ $errors->has('resposta') ? ' has-error' : '' }}">
    <label for="name" class="control-label">Resposta Incorrecte 3:</label>
    {!! Form::text('resposta_incorrecte3', null, ['class' => 'form-control', 'id' => 'resposta']) !!}
  </div>

  <div class="pull-right">
    {!! Form::button('+', array('class' => 'btn btn-success', 'id' => 'nou')) !!}
  </div>

<br/><br/><br/>
  <div class="pull-left">
    <button type="submit" class="btn btn-success">
        <i class="fa fa-btn fa-floppy-o"></i>Afegir
    </button>
  </div>

{!! Form::close() !!}


@endsection

@section('scripts')
  <script type="application/javascript">

    $(document).ready(function(){
      $('#nou').click(function(){
                alert("prova");
            });

    });
  </script>

@endsection
