<script type="application/javascript">
  var count=0;
</script>
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-12 col-md-offset-0">
        @include('flash::message')
          <div class="panel panel-default preg-margin">
              <div class="panel-heading">Afegir preguntes</div>
              <div class="panel-body">
                <div class="col-md-12 form_preguntes">
                    <!-- <h1>Afegir preguntes</h1> -->
                    <br/>
                    <p>Per afegir correctament la pregunta hauràs d'introduir una resposta correcta, i com a mínim, una d'incorrecta. D'incorrectes hi han un màxim de 3 respostes.</p>
                    <p class="petit"> Camps obligatoris (*) </p>


                    {!! Form::open(array('url' => '/preguntes', 'files'=>true, 'method' => 'POST')) !!}

                    <!-- Afegim un desplegable on selecciona el nivell al que fa referència la pregunta -->
                    <div class="form-group {{ $errors->has('nivell') ? ' has-error' : '' }}">
                      <label for="name" class="control-label">Nivell *:</label>
                        {{ Form::select('nivell', array('1' => '1', '2' => '2', '3' => '3')) }}
                    </div>

                      <!-- Afegim el camp pregunta que es on s'escriurà l'enunciat de la pregunta -->
                      <div class="form-group {{ $errors->has('pregunta') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Pregunta *:</label>
                          {!! Form::text('pregunta', null, ['class' => 'form-control', 'id' => 'pregunta'], array('required' => 'required', 'autofocus' => 'autofocus')) !!}
                      </div>

                      <!-- Afegim el camp descripcio que es on s'escriurà la descripció de la pregunta -->
                      <div class="form-group {{ $errors->has('descripcio') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Descripció *:</label>
                          {!! Form::textarea('descripcio', null, ['class' => 'form-control', 'id' => 'descripcio', 'size' => '30x5']) !!}
                      </div>

                      <!-- Afegim el camp imatge que es on s'inclourà una imatge a la pregunta (opcional) -->
                      <div class="form-group {{ $errors->has('imatge') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Imatge *:</label>
                          {!! Form::file('imatge', ['class' => 'field']) !!}
                      </div>

                      <!-- Afegim el camp resposta que es on introduirem les possibles repostes per a la pregunta que estem creant -->
                      <div class="form-group {{ $errors->has('resposta') ? ' has-error' : '' }}">
                        <label for="name" class="control-label">Resposta Correcte *:</label>
                        {!! Form::text('resposta_correcte', null, ['class' => 'form-control', 'id' => 'resposta'], array('required' => 'required')) !!}
                      </div>
                      <div class="form-group {{ $errors->has('resposta1') ? ' has-error' : '' }}" id="incorrecte1">
                        <label for="name" class="control-label">Resposta Incorrecte 1 *:</label>
                        {!! Form::text('resposta_incorrecte1', null, ['class' => 'form-control', 'id' => 'resposta1']) !!}
                      </div>
                      <div class="form-group {{ $errors->has('resposta2') ? ' has-error' : '' }}" id="incorrecte2" style="display:none">
                        <label for="name" class="control-label">Resposta Incorrecte 2:</label>
                        {!! Form::text('resposta_incorrecte2', null, ['class' => 'form-control', 'id' => 'resposta2']) !!}
                      </div>
                      <div class="form-group {{ $errors->has('resposta3') ? ' has-error' : '' }}" id="incorrecte3" style="display:none">
                        <label for="name" class="control-label">Resposta Incorrecte 3:</label>
                        {!! Form::text('resposta_incorrecte3', null, ['class' => 'form-control', 'id' => 'resposta3']) !!}
                      </div>
                      <div class="pull-right">
                        <!-- <button type="button" class="btn btn-success" id="nou"> -->
                            <i class="fa fa-plus-square" style="font-size: 35px;" id="nou"></i>
                        <!-- </button> -->
                        <!-- {!! Form::button('+', array('class' => 'btn btn-success', 'id' => 'nou')) !!} -->
                      </div>

                      <div class="captcha">
                        <label for="name" class="control-label">Verifica:</label>
                        {!! app('captcha')->display(); !!}
                      </div>
                      <div class="form-group {{ $errors->has('checkbox') ? ' has-error' : '' }}">
                        {!! Form::checkbox('verifica', 'accept'); !!} <!-- Checkbox on la variable del formulari serà verifica i el valor quan marquem el check serà accept -->
                        <label for="name" class="control-label"> Accepto les <a href="/condicions">condicions d'ús</a> d'aquesta pàgina web. </label>
                      </div>



                      <div class="pull-left">
                        <button type="submit" class="btn btn-success btn-lg">
                            <i class="fa fa-btn fa-floppy-o icons"></i>Afegir
                        </button>
                      </div>

                    {!! Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


@endsection

@section('scripts')
  <script type="application/javascript">

    $(document).ready(function(){
      $('#nou').click(function(){
                count=count+1;
                if (count==1) {
                  document.getElementById('incorrecte2').style.display = "block";
                }
                else if (count==2) {
                  document.getElementById('incorrecte3').style.display = "block";
                  document.getElementById('nou').style.display = "none";
                }

            });

    });
  </script>

@endsection
