@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>HAS PERDUT :(</h1>
            <h2>No has superat el nivell, però no et desanimis, torna-ho a intentar!</h2>
            <a class="btn btn-primary btn-lg" href="{{ url('/home') }}" role="button">Torna!</a>
        </div>
    </div>
</div>


@endsection
