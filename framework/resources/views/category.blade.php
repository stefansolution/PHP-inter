@extends('front_layout.header')

@section('content')
 

    @include('front_layout.navbar')
        <!---------------------top coupons------------------>
        
<div class="row top_coupons pb-4 mb-4">
    <div class="container mb-4">
      @if(count($coupons)>0)
      <h1 class="text-center mb-4 mt-4">Our top {{$categoryDetails->category_name}} coupons and discount codes</h1>

      @include('coupon')
      @else
      <h1 class="text-center mb-4 mt-4">Coupons and discount codes not found</h1>
      @endif
  </div>

</div>
<!--------------------top stores-------------------------->

<div class="row top_stores category-store-container pb-4 mb-4"></div>
<!-------------------end top stores--------------------->
           
    @include('front_layout.footer')

@endsection
