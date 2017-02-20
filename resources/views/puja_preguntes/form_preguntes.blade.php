<?php $count=1; ?>
@extends('layout')

@section('content')

<h1>Afegir preguntes</h1>
<br/><br/>

{!! Form::open([]) !!}
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
    <label for="name" class="control-label">Resposta <?php echo $count; ?>:</label>
    {!! Form::text('resposta', null, ['class' => 'form-control', 'id' => 'resposta']) !!}
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
        <?php $count=$count+1; ?>
                alert("prova");
            });

    });
  </script>

@endsection
