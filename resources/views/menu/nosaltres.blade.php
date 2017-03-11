@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Qui som?</h1>

            <p>Som estudiants de segon de desenvolupament d'aplicacions web de l'institut Lacetània, Manresa.
Junts hem desenvolupat una aplicació per aprendre angles, en la que l'usuari respon unes preguntes, si respon les suficients preguntes de forma correcta, haurà guanyat. També hi haurà professors que podran crear noves preguntes segons el nivell.</p>

            <h3>Participants:</h3>

            <ul>
<<<<<<< Updated upstream
              <li>Oriol Farré Lizana</li>
              <li>Raúl Sanchez Robles</li>
              <li>Alexander Bruno </li>
=======
              <li>Oriol Farré Lizana: <span class="emails">farre.lizana.oriol@gmail.com</span> </li>
              <li>Raúl Sanchez Robles: <span class="emails">raulsanchezrobles14@gmail.com</span></li>
              <li>Alexander Bruno Lima: <span class="emails">alexander.bruno1995@gmail.com</span></li>
>>>>>>> Stashed changes
            </ul>

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
