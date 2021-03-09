
      @if($countexpired!=0)
      <h5 class="mt-4 mb-3 text-center text-uppercase" id="q6">{{$countexpired}} old and expired coupon codes for {{$storedetail->store_name}}</h5>
      @endif
     @foreach($expierdcoupon as $expierd)
     
      <div class="coupon-list-row coupons_used expired-coupons" CouponId="{{$expierd['coupon_id']}}" index="{{$expierd['id']}}">
        <div class="coupon-info-container">
           <img class="coupon-logo" src="{{$assets_front}}/assets/store_images/{{$expierd['Storedetails']->image}}"  alt="{{$expierd['Storedetails']->store_name}} discount code"/>
          <a class="coupon-info mob-order-1 coupon-store" special-url="{{$expierd['Storedetails']->special_url}}" href="https://dealrated.com/store/{{$expierd['Storedetails']->slug}}#c={{$expierd['coupon_id']}}">
            <div class="coupon-heading">

            {{$expierd['Storedetails']->store_name}}
            </div>
            <div class="coupon-line-1">{{$expierd['description']}}</div>
            <div class="coupon-domain">at <strong>{{$expierd['Storedetails']->domain}}</strong></div>            
          </a>
        </div>
        <div class="coupon-feature mob-order-4 last-used">
          <div class="coupon-feature-title">Coupon used</div>
          <div class="coupon-feature-value">
            @if($expierd['coupon_used']>0)
              <span class="coupon_used">{{$expierd['coupon_used']}}</span> times
            @endif
          </div>
        </div>
        @if($expierd['Storedetails']->reveal_code==1)
        <div class="coupon-button mob-order-4 reveal-copy-code" store-slug="{{$expierd['Storedetails']->slug}}"  coupon="{{$expierd['code']}}">
            <span>Copy code </span>
            <span>{{$expierd['code']}}</span>
           
        </div>
        
        @else
        <div class="coupon-button mob-order-4 store-copy-copon" store-slug="{{$expierd['Storedetails']->slug}}"  coupon="{{$expierd['code']}}">
            Show code
        </div>
        @endif
      </div>  
      @endforeach
    <!--</div>
  </div>-->