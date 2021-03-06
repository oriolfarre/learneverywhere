@extends('layouts.app')

@section('content')
<!-- <div class="home-header">
  <div class="container-fluid"></div>
</div> -->


<div class="container">
    <div class="row">
        <div class="col-md-12">
          <h1>Aprèn anglès de la forma més divertida!</h1>


          <div class="owl-carousel owl-theme">
              <div class="item"><h2><a href="{{ url('nivell/1') }}">Level 1</a></h2></div>
              <div class="item"><h2><a href="{{ url('nivell/2') }}">Level 2</a></h2></div>
              <div class="item"><h2><a href="{{ url('nivell/3') }}">Level 3</a></h2></div>
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
