@extends('front_layout.header')

@section('content')
 

    @include('front_layout.navbar')
        
    <div class="container content text-center text-uppercase pt-3 pb-3">
      <!--<p>DEALRATED HELPS SHOPPERS TO FIND SAVINGS AT ALMOST ANY STORE ONLINE.</p>-->
      
    </div>
    <!--------------end section-------------->

    <!---------------------about------------->
   <!-- <div class="row about_sec pt-4">
      <div class="container pt-4 mt-3 mb-4 pb-4">
         <h3 class="mb-3 text-center"><b>Invaild Store</b></h3>
      </div>
    </div>-->
    <!----------------end about------------------>
    <!---------------------testimonial--------------->
    <div class="row testimonial pt-4 pb-4">
        <div class="container pt-3 pb-4 mb-4">
          <h4 class="text-center mb-4 pb-4">Store under construction.</h4>
        </div>
    </div>

    @include('front_layout.footer')

@endsection