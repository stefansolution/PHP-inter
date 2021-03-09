@extends('front_layout.header')

@section('content')
 

    @include('front_layout.navbar')
       
    <!---------------------------promo codes------------->
<div class="container content text-center text-uppercase pt-4">
     <p>DEALRATED HELPS SHOPPERS TO SAVE MONEY  <br> AT THOUSANDS OF STORES ONLINE.</p>
    <div class="row pb-4 mb-4 pt-2">
         <div class="col-md-4 col-xs-12"></div>
         <div class="col-md-4 col-xs-12">
         </div>
         <div class="col-md-4 col-xs-12"></div>
    </div>
</div>


<div class="row top_coupons pb-4 mb-4">
    <div class="container mb-4">
     @if($countcoupon)
      <h3 class="text-center mb-4 mt-4"><b>({{$countcoupon}} Discounts & Promo Codes) @php echo date("F Y");  @endphp</b></h3>
    @include('coupon')
    @else
      <h3 class="text-center mb-4 mt-4"><b>Coupons Not Found</b></h3>
    @endif
  </div>

</div>

 
    @include('front_layout.footer')

@endsection
