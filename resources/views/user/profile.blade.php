@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
          <h2>{{ $user->name }}'s profile!'</h2>
          {!! Form::open(array('url' => '/profile', 'files'=>true)) !!}
              <label class="pull-left">Canviar imatge de perfil</label><br/><br/>
              {!! Form::file('avatar', ['class' => 'pull-left center-block well well-sm']) !!}
              <input type="submit" class="pull-right btn btn-sm btn-primary">
          {!! Form::close() !!}


        </div>
    </div>
</div>

@endsection
