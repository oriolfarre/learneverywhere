@extends('layouts.app')

@section('content')
<div class="jumbotron text-center">
  <div class="profile-image">
    <img class="img-responsive" src="/uploads/avatars/{{ $user->avatar }}">
  </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default prof-margin">
            <div class="panel-heading title"><h2>{{ $user->name }}'s profile!</h2></div>
                <div class="modal-body text">

                    {!! Form::open(array('url' => '/profile', 'files'=>true, 'method' => 'POST')) !!}
                        <label class="pull-left form-group">Canviar imatge de perfil</label><br/><br/>
                        {!! Form::file('avatar', ['class' => 'pull-left center-block form-group']) !!}
                        <input type="submit" class="pull-right btn btn-sm btn-primary">
                    {!! Form::close() !!}

                    <div class="profile-score">
                      <h3><i class="fa fa-trophy icons" aria-hidden="true"></i>Puntuació Total: {{ $user->punts }}</h3>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>

@endsection
