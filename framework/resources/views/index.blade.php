@extends('front_layout.header')

@section('content')

    @include('front_layout.navbar')
    
     @if ($message = Session::get('success'))
        <div class="offset-md-4 col-md-4 alert alert-success ">
            <p>{{ $message }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </p>
            
        </div>
    @endif
    <!----------------------section-------------------->
        <div class="container content text-center text-uppercase pt-4 pb-4">
             <p>DEALRATED HELPS SHOPPERS TO SAVE MONEY  <br> AT THOUSANDS OF STORES ONLINE.</p>
        </div>
        <!--------------end section-------------->
        <!----------------------stores----------------->
        <div class="row pt-4 pb-4 favourite_stores">
            <div class="container pt-4 mt-4">
                <h1 class="text-center mb-4 text-white">Coupons and Discount Codes at stores we love ❤️</h1>
                <div class="row mb-4 mt-4 pt-4 pb-4">
                   @foreach($fav_stores as $store)
                    <div class="col-sm-4 codes mb-4">

                        <div class="stores">
                           <a href="{{url('store/'.$store->slug)}}">
                            <div class="row">
                               <div class="col-xs-4 p-0 pl-2 pr-2 text-center">
                                  <img src="{{$assets_front}}/assets/images/loading70x70.gif" alt="{{$store->store_name}}" data-src="{{ $assets_front}}/assets/store_images/{{$store->image}}" />
                               </div>
                               <div class="col-xs-8 pt-2 pl-2 pr-2">
                                   <h4>{{$store->store_name}}</h4>
                                   <p>{{$store->domain}}</p>
                               </div>
                            </div>
                          </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <!---------------------top coupons------------------>
        <div class="row top_coupons pb-4 mb-4 pt-4 mt-4">
            <div class="container mb-4 mt-4">
                <h2 class="text-center mb-4">Today's top coupons and discount codes</h2>
                @include('coupon')
            </div>

        </div>
        
        <!--------------------top stores-------------------------->
        <div class="row top_stores pb-4 mb-4">
             <div class="container">
                   <h3 class="text-center mb-4"><b>Find more top coupons and discount</b><br> codes at today's top stores</h3>
                   <div class="row">
                    @foreach($topstores as $store)
                      <div class="col-md-3 col-xs-12 left product">
                        <a href="{{url('store/'.$store->slug)}}">
                          <div class="coupon_stores text-center">
                              
                            <img src="{{$assets_front}}/assets/images/loading150x150.gif" alt="{{$store->store_name}}" data-src="{{ $assets_front}}/assets/store_images/{{$store->image}}"/>
                            <h4>{{$store->store_name}}</h4>
                            <a href="{{url('store/'.$store->slug)}}">{{$store->domain}}</a>
                          </div>
                        </a>
                      </div>
                      @endforeach
                   </div>
             </div>
        </div>
        <!------------------------top categories------------------>
        <div class="row top_categories pb-3 mb-3">
             <div class="container pb-3 mb-3">
                <h3 class="text-center mb-4"><b>Today's top categories</b></h3>
                <div class="row mt-3 pt-3">
                   @foreach($categories->chunk(3) as $chunk)
                    <div class="col-md-3 col-xs-12 list_categories">
                        <ul class="p-0">
                          @foreach($chunk as $category)
                            <li><a href="{{url('/category/'.$category->slug.'/')}}">{{$category->category_name}}</a></li>
                          @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
             </div>
        </div>  
    @include('front_layout.footer')

@endsection
