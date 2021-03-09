@extends('front_layout.header')

@section('content')
 

    @include('front_layout.navbar')
       
    <!---------------------------promo codes------------->
<div class="row top_coupons pb-4">
    <div class="container">

      <h1 class="text-center mb-4 mt-4">{{$storedetail->store_name}} ({{$couponCount}} Discounts & Promo Codes)</h1>
    <div class="coupon-list-container ">
    @if(count($coupons)>0)
    @php
        $i = 0;
    @endphp
      @foreach($coupons as  $key=>$coupon)
       @if($i<=2)
       
      <div class="coupon-list-row promo_code " CouponId="{{$coupon['coupon_id']}}" index="{{$coupon['id']}}">
        <div class="coupon-info-container">
          <img class="coupon-logo" src="{{$assets_front}}/assets/images/loading70x70.gif" alt="{{$coupon['Storedetails']->store_name}} discount code" data-src="{{ $assets_front}}/assets/store_images/{{$coupon['Storedetails']->image}}"/>
          
          
          
          <a class="coupon-info coupon-store" special-url="{{$coupon['Storedetails']->special_url}}"  href="https://dealrated.com/store/{{$coupon['Storedetails']->slug}}#c={{$coupon['coupon_id']}}">
        
            <div class="coupon-heading">
            {{$coupon['Storedetails']->store_name}}
            </div>
            <div class="coupon-line-1">{{$coupon['description']}}</div>
            <div class="coupon-domain">at <strong>{{$coupon['Storedetails']->domain}}</strong></div>
          </a>
        </div>
        <div class="coupon-feature discovered ">
          <div class="coupon-feature-title">Discovered</div>
          <div class="coupon-feature-value">{{$coupon['discovered']}}</div>
        </div>
        <div class="coupon-feature ">
          <div class="coupon-feature-title">Coupon used</div>
          <div class="coupon-feature-value">
          @if($coupon['coupon_used']>0)
              <span class="coupon_used">{{$coupon['coupon_used']}}</span> times
            @endif
          </div>
      
        </div>
        <div class="coupon-feature ">
          <div class="coupon-feature-title">Last used</div>
          <div class="coupon-feature-value">Today</div>
        </div>
        @if($coupon['Storedetails']->reveal_code==1)
        <div class="coupon-button  reveal-copy-code" store-slug="{{$coupon['Storedetails']->slug}}"  coupon="{{$coupon['code']}}">
            <span>Copy code </span>
            <span>{{$coupon['code']}}</span>
        </div>
        @else
        <div class="coupon-button  store-copy-copon" store-slug="{{$coupon['Storedetails']->slug}}"  coupon="{{$coupon['code']}}">
            Show code
        </div>
        @endif
      </div>
      @php
      $i++
      @endphp
      @endif
      @endforeach
      @if(count($coupons)>3)
      <div class="text-center mt-4"><button type="button" style="background-color:#41C685;" class="btn btn-success load-more"><a href="#q5" style="color:white">More coupons for {{$coupon['Storedetails']->store_name}} below</a></button>
      </div>
     @endif
      
     @else
            <h3 class="text-center mb-4 mt-4">Coupons not Found.</h3>
     @endif 
      </div>
  </div>

</div>
<!------------------end promo codes----------------->
<!------------------about retrospec--------------->
<div class="container-fluid">
    <div class="container about_retrospec pt-4 pb-4 mt-4">
        <h4 class="mb-4"><b>ABOUT {{strtoupper($storedetail->store_name)}} </b></h4>
      <div class="row mb-4">
          <div class="col-12 p-0">
            <div class="coupon-info-container about-info-container">
                <img class="coupon-logo rounded-circle store-domain" special-url="{{$storedetail->special_url}}" alt="{{$storedetail->store_name}} discount code" id="coupon-store-image" src="{{$assets_front}}/assets/images/loading70x70.gif" data-src="{{$assets_front}}/assets/store_images/{{$storedetail->image}}">
              <a class="coupon-info" >
              <div class="coupon-line-1 store-domain" special-url="{{$storedetail->special_url}}">{{$storedetail->store_name}}</div>
              <div class="coupon-domain">{{$storedetail->domain}}</div>
              </a>
            </div>
                @foreach($storecategories as $storecategory)
         
              <a style="float:left;" class="m-1" href="{{url('category/'.$storecategory->slug)}}"><button type="button"  class="btn btn-success">{{$storecategory->category_name}}</button></a>
              @endforeach
        </div>
        
        <div class="col-md-10 col-xs-12 p-0 right mt-3 ">
            @foreach($store_categories as  $row)
            <a href="{{url('/category/')}}/{{$row->slug}}" class="btn btn-success m-0 mb-1">{{$row->category_name}}</a>
            @endforeach
		</div>
      </div>
     <!--  <h6 class="mb-4">L.A. Gear that gets you.</h6> -->
     @if(count($coupons)>0)
      <h5 class="mb-2"><b>ABOUT OUR {{strtoupper($storedetail->store_name)}} COUPONS </b> <span class="store-icon mr-1">🏷</span></h5>
      <p>Dealrated currently has {{$couponCount}} active discount codes for {{strtoupper($storedetail->store_name)}}. Our top deal will save you {{$couponoff}} at {{strtoupper($storedetail->store_name)}}. We've also discovered other coupons for {{$couponoff}}.</p>
      <p>Our latest promo code was found on {{date('M d, Y',strtotime($lastupdated['updated_at']))}}.
      @if($everyday!=0)
      In the last {{$lastday}} days Dealrated has found {{$couponCount}} new {{strtoupper($storedetail->store_name)}} promo codes. On average we discover a new {{strtoupper($storedetail->store_name)}} discount code every {{$everyday}} days. 
      @endif
      {{strtoupper($storedetail->store_name)}} shoppers told us they save an average of @if($avg_type=='$') ${{$avg_saving}} @else {{$avg_saving}}% @endif  with our codes.
      </p>
        <!--<p></p>-->
      @endif
    </div>
</div>
<!------------------------end about retrospec------------->
<!----------------------discount codes------------------->
 <div class="container discount_codes mt-4 pt-4">
      <h2 class="text-center mb-4">Our {{$storedetail->store_name}} Coupons, Promos and Discount Codes</h2>
    <div class="row mt-4 pt-4 mb-4 pb-4">
        <div class="col-md-6 col-xs-12">
        <table class="table">
        <tbody>
         <tr>
          <td><div class="table-items"><span class="store-icon mr-1">💰</span> Average Saving:</div></td>
          <td>
              @if($avg_type=='$')
              <div class="table-items">${{$avg_saving}}</div>
              @else
              <div class="table-items">{{$avg_saving}}% </div>
              @endif
              </td>
          </tr>
          <tr>
          <td style="width: 200px;"><div class="table-items"><span class="store-icon mr-1">💸</span> Coupons Available:</div></td>
          <td><div class="table-items">@if($couponCount==0)
                    NA
              @else
                {{$couponCount}}
              @endif
            </div>
          </td>
          </tr>
          <tr>
          <td><div class="table-items"><span class="store-icon mr-1">👍</span> Best Coupon:</div></td>
          <td><div class="table-items">@if($couponoff)
                  {{$couponoff}}
              @else
                
                NA
              @endif  
              </div>
          </td>
          </tr>
           <tr>
          <td><div class="table-items"><span class="watch-icon mr-1">🕒</span> Last Updated:</div></td>
          <td><div class="table-items">@if($lastupdated['updated_at']==null)
                  NA
              @else
                
                {{date('M d, Y ',strtotime($lastupdated['updated_at']))}}
              @endif 
              </div>
           </td>
          </tr>
        </tbody>
            </table>
      </div>
        <div class="col-md-6 col-xs-12">
          <ul>
              @if($couponCount>3)
            <li><a href="#q0">{{$couponCount}} active <strong> {{$storedetail->store_name}}</strong> promo codes</a></li>
            @endif
            @if($countexpired>1)
               <li><a href="#q6">{{$countexpired}} old & expired <strong>{{$storedetail->store_name}}</strong> discounts</a></li>
            @endif   
           @if(count($coupons)>0)    
               <li><a href="#q1"><span>🗓 </span>When does {{$storedetail->store_name}} release new coupon codes?</a></li>
              <li><a href="#q2">🤔 How do I use promo codes for {{$storedetail->store_name}}?</a></li>
           @endif    
               <li><a href="#q3"><span>🛍 </span>Where do I get the latest discounts for {{$storedetail->store_name}}?</a></li>
               <!-- <li><a href="#q4">What is the best way to save money when I shop online?</a></li> -->
               <!-- <li>Can I submit a {{$storedetail->store_name}} coupon code? -->
        </ul>
      </div>
    </div>
 </div>

<!--------------------end discount codes---------------->
<!---------------------top coupons---more active and expired coupon--------------->
<div class="row top_coupons more-active-epixred-coupon pb-4 mb-4" id="q5">
    <div class="container mb-4">
   @if($couponCount>3 || $countexpired>0) 
      <h3 class="text-center mb-4"><b>More {{$storedetail->domain}} coupons & discount codes</b></h3>
    @endif
        <div class="coupon-list-container ">
        @if(count($coupons)>3)
        <h5 class="text-center mb-3 text-uppercase" id="q0">{{$couponCount-3}} active coupon codes for {{$storedetail->store_name}}</h5>
        @endif
        
        @if(count($coupons)>=3)
        @php
            $i = 0;
        @endphp
        @foreach($coupons as $key=>$coupon)
        @if($i > 2)
        
        <div class="coupon-list-row coupons_used" CouponId="{{$coupon['coupon_id']}}" index="{{$coupon['id']}}">
            <div class="coupon-info-container">
              <img class="coupon-logo" src="{{$assets_front}}/assets/images/loading70x70.gif" alt="{{$coupon['Storedetails']->store_name}} discount code" data-src="{{$assets_front}}/assets/store_images/{{$coupon['Storedetails']->image}}"/>
              <a class="coupon-info mob-order-1 coupon-store" special-url="{{$coupon['Storedetails']->special_url}}" href="https://dealrated.com/store/{{$coupon['Storedetails']->slug}}#c={{$coupon['coupon_id']}}">
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
              <div class="coupon-feature-title">Coupon used</div>
              <div class="coupon-feature-value">
              @if($coupon['coupon_used']>0)
                 <span class="coupon_used"> {{$coupon['coupon_used']}}</span> times
                @endif
              </div>
            </div>
            <div class="coupon-feature mob-order-4">
              <div class="coupon-feature-title">Last used</div>
              <div class="coupon-feature-value">
                Today
              </div>
            </div>
            @if($coupon['Storedetails']->reveal_code==1)
            <div class="coupon-button mob-order-4 reveal-copy-code" store-slug="{{$coupon['Storedetails']->slug}}"  coupon="{{$coupon['code']}}">
                <span>Copy code </span>
                <span>{{$coupon['code']}}</span>
                
            </div>
            @else
            <div class="coupon-button mob-order-4 store-copy-copon" store-slug="{{$coupon['Storedetails']->slug}}"  coupon="{{$coupon['code']}}">
                Show code
            </div>
            @endif
        </div>
       @endif
      @php
      $i++
      @endphp
    
      @endforeach
      @endif
        <div class="expired-coupon"></div>    
        
        
    </div>
  </div>
</div>

<!-----------------accordion------------------->
    <div class="container">
    <div id="accordion">
    @if(count($coupons)>0) 
      <div class="card" id="q1">
   
        <a class="card-link" data-toggle="collapse" href="#" ><div class="card-header" ><h3><span>🗓 </span>
            When does {{$storedetail->store_name}} release new coupon codes?
        </h3></div></a>
       
        <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body">
          Recently, we’ve been able to find a new discount code from {{$storedetail->store_name}}   
          @if($everyday==0)
            <strong>every day</strong>.
          @elseif($everyday==1)
            <strong>every {{$everyday}} day</strong>.  Over the past month we’ve found {{$couponCount}} new coupons from {{$storedetail->store_name}}.
          @else
          <strong>every {{$everyday}} days</strong>.  Over the past month we’ve found {{$couponCount}} new coupons from {{$storedetail->store_name}}.
          @endif
          
        </div>
        </div>
      </div>
      @endif 
      <div class="card mt-3" id="q2">
          <a class="card-link" data-toggle="collapse" href="#" ><div class="card-header" >🤔 How do I use promo codes for {{$storedetail->store_name}}?
      
          </div></a>
        <div id="collapseTwo" class="collapse show" data-parent="#accordion">
        <div class="card-body">
          When you are viewing your cart and about to checkout on  {{$storedetail->domain}}, be sure to look out for a field that asks you to enter a code for a discount.
        </div>
        </div>
      </div>
      <div class="card mt-3" id="q3">
         <a class="card-link" data-toggle="collapse" href="#" ><div class="card-header" ><h3><span>🛍 </span>
        Where do I get the latest discounts for {{$storedetail->store_name}}?
        </h3></div></a>
        <div id="collapseThree" class="collapse show" data-parent="#accordion">
        <div class="card-body">
        Subscribe to DealRated email alerts for {{$storedetail->store_name}} and you will never miss a coupon again. Every time we find a new discount code, we’ll send you an email. Subscribe, and stay on top of the latest deals. 
          <form id=subscribe-form>
              <div class="input-group mb-3 mt-3 col-md-4 subscribe">
                <input type="text" class="form-control" index="{{$storedetail->id}}" store="{{$storedetail->store_name}}" name="q" id="subscribe" placeholder="Email">
                <div class="input-group-append">
                  <button type="button" class="btn btn-subscribe">Subscribe</button>
                  <!-- <span class="input-group-text">Subscribe</span> -->
                </div>
                <span class="subscribe-success"></span>
              </div>
          </form>
        </div>
        </div>
      </div>
     <!-- <div class="card mt-3" id="q4">
         <a class="card-link" data-toggle="collapse" href="#" ><div class="card-header" >
        What is the best way to save money when I shop online?
        </div></a>
        <div id="collapseThree" class="collapse show" data-parent="#accordion">
        <div class="card-body">
          We recommend using the <a href="javasript:void(0);" >Dealrated Chrome Extension</a> to make sure that you never miss a deal when you shop online. The Dealrated for Google Chrome automatically finds discounts and coupon codes for you while you shop. You get the best discounts every time you shop, without having to search for coupon codes online.
        </div>
        </div>
      </div> -->     
    </div>
    </div>
<!----------------end accordion----------------->
<!--------------------top stores-------------------------->

       <div class="related-store-container"></div>
        
<!------------------------top categories------------------>
   <div class="popular-related-store-container"></div>   
 
    @include('front_layout.footer')

@endsection
