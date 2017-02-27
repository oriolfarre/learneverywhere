@extends('layout')

@section('content')

<h1>Activitats</h1>

<ul>
	@foreach($preguntes as $pregunta)
	<li>
		<a href="activitats/{{$pregunta -> id_pregunta}}">{{ $pregunta -> pregunta}}</a>

	</li>
	@endforeach
</ul>

@endsection