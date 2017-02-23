@extends('layouts.app')

@section('content')
<div class="home-header">
  <div class="container-fluid">...</div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
          <div class="owl-carousel owl-theme">

              <div class="hovereffect">
                  <img class="img-responsive" src="http://placehold.it/350x200" alt="">
                  <div class="overlay">
                     <h2>Hover effect 4</h2>
                     <a class="info" href="#">link here</a>
                  </div>
              </div>

              <div class="item"><h2>Level 2</h2></div>
              <div class="item"><h2>Level 3</h2></div>
              <div class="item"><h2>Level 4</h2></div>
              <div class="item"><h2>Level 5</h2></div>


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
