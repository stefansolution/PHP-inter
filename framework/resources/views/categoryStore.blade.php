<div class="container mb-4s">
      @if(count($stores)>0)
         <h2 class="text-center mb-4">Find more top {{$categoryDetails->category_name}} coupons and<br> discount codes at today's top stores</h2>
       <div class="row">
        @foreach($stores as $store)
        <a href="{{url('store/'.$store->slug)}}">
          <div class="col-md-3 col-xs-12 left product">
            <div class="coupon_stores text-center">
              <img src="{{$assets_front}}/assets/store_images/{{$store->image}}" alt="{{$store->store_name}}"/>
            <h4>{{$store->store_name}} </h4>
            <a href="{{url('store/'.$store->slug)}}">{{$store->domain}}</a>
          </div>
         </div>
         </a>
         @endforeach
         
       </div>
    @endif
   </div>