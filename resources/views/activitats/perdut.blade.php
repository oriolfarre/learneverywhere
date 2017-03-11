@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Has perdut :()</h1>
            <h2>No has superat el nivell, però no et desanimis, pots tornar a intentar-ho!</h2>
            <a class="btn btn-primary btn-lg" href="{{ url('/home') }}" role="button">Torna-hi!</a>
        </div>
    </div>
</div>


@endsection
