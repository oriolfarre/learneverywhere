@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Som alumnes de DAW</h1>

            Variable = {{ $pepe = 60 }}

            <div class="progress">
              <div class="progress-bar {{ $pepe < 30 ? 'progress-bar-danger' : null}} progress-bar-striped active" role="progressbar"
              aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:{{$pepe}}%">
              </div>
            </div>

        </div>
    </div>
</div>

@endsection
