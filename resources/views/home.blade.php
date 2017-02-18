@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
      })
    });
  </script>

@endsection
