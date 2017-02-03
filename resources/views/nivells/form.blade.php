@extends('layout')

@section('content')

<h1>Level 1</h1>
<br/><br/>

{!! Form::open([]) !!}

  <p> Pregunta 1:</p>{!! Form::text('name', @$name) !!}<br/><br/>

  <p> Pregunta 2:</p>{!! Form::text('name', @$name) !!}<br/><br/>

  <p> Pregunta 3:</p>{!! Form::text('name', @$name) !!}<br/><br/>

  <p> Pregunta 4:</p>{!! Form::text('name', @$name) !!}<br/><br/>

  <p> Pregunta 5:</p>{!! Form::text('name', @$name) !!}<br/><br/><br/>

  {!! Form::submit('Comprova') !!}

{!! Form::close() !!}


@endsection
