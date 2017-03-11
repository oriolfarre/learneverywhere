@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>ENHORABONA!</h1>
            <h2>Has superat el nivell, si vols gaudir de totes les funcions, registrat!</h2>
            <a class="btn btn-primary btn-lg" href="{{ url('/register') }}" role="button">Registrar</a>
        </div>
    </div>
</div>


@endsection
