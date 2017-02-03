@extends('layout')

@section('content')

  <h1>Prova de learneverywhere</h1>


  <div class="owl-carousel owl-theme">
      <div class="item"><h2>Level 1</h2></div>
      <div class="item"><h2>Level 2</h2></div>
      <div class="item"><h2>Level 3</h2></div>
      <div class="item"><h2>Level 4</h2></div>
      <div class="item"><h2>Level 5</h2></div>
      <div class="item"><h2>Level 6</h2></div>
      <div class="item"><h2>Level 7</h2></div>
      <div class="item"><h2>Level 8</h2></div>

  </div>

@endsection

@section('scripts')
  <script type="application/javascript">

    $(document).ready(function(){

      $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
        }
      })
    });
  </script>

@endsection
