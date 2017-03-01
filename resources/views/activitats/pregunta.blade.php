@extends('layouts.app')

@section('content')

<h1>Activitat</h1>
<div>

	@if(isset($compare))
	    @foreach ($compare as $comp)
		    @if ($comp->correcte == 'si')
		        <p style="color: green;">Correcto</p>

		    @elseif($comp->correcte == 'no')
		    <p style="color: red;">Incorrecto</p>
		    @endif

		@endforeach
	@endif

	@foreach($pregunta as $preg)

			<p>{{ $preg -> pregunta}}</p>
			{{ $preg -> descripcio}}
			<img src="/img/{{$preg -> imatge}}" width="100">
	@endforeach

	<form action="{{ url('resolution') }}">
	@foreach($respostes as $resposta)

	<input type="radio" name="resposta" value="{{$resposta -> id_resposta}}">{{$resposta -> resposta}}<br>
@endforeach
	<input type="submit" name="">
	</form>

</div>
@endsection
