@extends('layouts.app')

@section('content')

<h1>Level 1</h1>
<br/><br/>

{!! Form::open([]) !!}

  <div class="form-group {{ $errors->has('pregunta1') ? ' has-error' : '' }}">
    <label for="name" class="control-label">Pregunta 1:</label>
      {!! Form::text('pregunta1', null, ['class' => 'form-control', 'id' => 'pregunta1']) !!}

  </div>


  <div class="pull-left">
    <button type="submit" class="btn btn-success">
        <i class="fa fa-btn fa-floppy-o"></i>Comprova
    </button>
  </div>

{!! Form::close() !!}


@endsection
