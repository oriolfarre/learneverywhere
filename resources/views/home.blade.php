@extends('layouts.app')

@section('content')
<!-- <div class="home-header">
  <div class="container-fluid"></div>
</div> -->


<!-- Modal Ajuda-->
<div id="ajuda" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1 class="modal-title">Ajuda</h1>
      </div>
      <div class="modal-body">
        <p>Per jugar has de seleccionar un nivell, aquest nivell et portarà a un lloc de la web on t'apareixeran una sèrie de preguntes.</p>
        <p>Segons el nivell seleccionat començaràs amb més o menys vida, que es representa en la barra de puntuació que trobaràs a la part inferior de l'activitat.</p>
        <p>Per completar el nivell aquesta barra haurà d'arribar al 100%, en cas contrari, si arriba a 0% hauràs perdut.</p></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tancar</button>
      </div>
    </div>

  </div>
</div>
<!--Final Modal-->

<div class="container">
    <div class="row">
        <div class="col-md-12">
          <h1>Aprèn anglès de la forma més divertida!</h1>
          <a class="btn btn-primary" href="{{ url('activitats') }}">
              Jugar!
          </a>
          <!-- Botó Ajuda Modal-->
          <button type="button" class="btn btn-primary fa fa-question-circle" data-toggle="modal" data-target="#ajuda"></button>
          <!-- Fi Botó Ajuda Modal-->

          <div class="owl-carousel owl-theme">
              <div class="item"><h2><a href="{{ url('nivell/1') }}">Level 1</a></h2></div>
              <div class="item"><h2><a href="{{ url('nivell/2') }}">Level 2</a></h2></div>
              <div class="item"><h2><a href="{{ url('nivell/2') }}">Level 3</a></h2></div>


          </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
  <script type="application/javascript">

    $(document).ready(function(){

      $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
      })
    });
  </script>

@endsection
