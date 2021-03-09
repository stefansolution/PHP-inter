<div class="coupon-list-container ">
  @if($coupons)
  @foreach($coupons as $coupon)
    <div class="coupon-list-row" index="{{$coupon['id']}}" couponid="{{$coupon['coupon_id']}}">
        <div class="coupon-info-container">
            <img class="coupon-logo" src="{{$assets_front}}/assets/images/loading70x70.gif" alt="{{$coupon['Storedetails']->store_name}} discount code" data-src="{{$assets_front}}/assets/store_images/{{$coupon['Storedetails']->image}}">
            @if($coupon['Storedetails']->special_url)
                 <a class="coupon-info mob-order-1" href="{{$coupon['Storedetails']->special_url}}">
            @else
             <a class="coupon-info mob-order-1" href="https://dealrated.com/store/{{$coupon['Storedetails']->slug}}">
            @endif     
                <div class="coupon-heading">
                {{$coupon['Storedetails']->store_name}}
                </div>
                <div class="coupon-line-1">{{$coupon['description']}}</div>
                <div class="coupon-domain">at <strong>{{$coupon['Storedetails']->domain}}</strong></div>
            </a>
        </div>
        <div class="coupon-feature  mob-order-3 discovered">
            <div class="coupon-feature-title">Discovered</div>
            <div class="coupon-feature-value">{{$coupon['discovered']}}</div>
        
        </div>
        <div class="coupon-feature mob-order-4">
            <div class="coupon-feature-title ">Coupon used</div>
            <div class="coupon-feature-value">
                
            @if($coupon['coupon_used']>0)
             <span class="coupon_used">{{$coupon['coupon_used']}}</span> times
            @endif
            </div>
        </div>
        <div class="coupon-feature mob-order-4">
            <div class="coupon-feature-title">Last used</div>
            <div class="coupon-feature-value"> Today
            </div>
        </div>
        <div class="coupon-button mob-order-4 copy-copon" store-slug="{{$coupon['Storedetails']->slug}}" coupon="{{$coupon['code']}}">
            Show code
        </div>
    </div>
    @endforeach  
@endif
    
 </div>  
