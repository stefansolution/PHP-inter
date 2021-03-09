<div class="row top_stores pb-4 mb-4 pt-4 mt-4">
    <div class="container">
         @if(count($stores)>0)
         <h3 class="text-center mb-4"><b>Find coupons at stores like {{$storedetail->store_name}}</b></h3>
       <div class="row">
          @foreach($stores as $store)
          <div class="col-md-3 col-xs-12 left product">
            <a href="{{url('store/'.$store->slug)}}">
            <div class="coupon_stores text-center">
              <img src="{{ $assets_front}}/assets/store_images/{{$store->image}}" alt="{{$store->store_name}}" data-src="" />
              <h4>{{$store->store_name}} </h4>
              <a href="{{url('store/'.$store->slug)}}">{{$store->domain}}</a>
            </div>
         </div>
       </a>
         @endforeach 
       </div>
       @endif
   </div>
</div>