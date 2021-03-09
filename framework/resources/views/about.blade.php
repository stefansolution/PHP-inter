@extends('front_layout.header')

@section('content')
 

    @include('front_layout.navbar')
        
    <div class="container content text-center text-uppercase pt-3 pb-3">
      <p>DEALRATED HELPS SHOPPERS TO SAVE MONEY  <br> AT THOUSANDS OF STORES ONLINE.</p>
      
    </div>
    <!--------------end section-------------->

    <!---------------------about------------->
    <div class="row about_sec pt-4">
      <div class="container pt-4 mt-3 mb-4 pb-4">
         <h3 class="mb-3"><b>About Dealrated</b></h3>
         <p>We are your ultimate source when it comes to saving money when you shop online. We work diligently to find coupons that are valid and real, so that you don’t have to waste time trying to find them on your own.</p>
         <p><!--<a href="#">We only publish coupon codes.</a>--> We partner with many great stores to provide our audience with the latest deals to save you money.</p>
         <!--<p><a href="#">We work with stores</a> to bring shoppers the best deals at the stores they love.</p>-->
      </div>
    </div>
    <!----------------end about------------------>
        <div class="row testimonial pt-4 pb-4">
        </div>
        <div class="row testimonial pt-4 pb-4">
        </div>
    <!---------------------testimonial--------------->
   <!-- <div class="row testimonial pt-4 pb-4">
        <div class="container pt-3 pb-4 mb-4">
          <h4 class="text-center mb-4 pb-4">What shoppers say about Dealrated</h4>
      
        <div id="demo" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="carousel-caption">
                 <p> "OMG, This actually works! Had to go through 3 coupon codes for this particular store and then...BAM! One worked and I saved 15% off my purchase. Thank you sooooo much :-D"Kirra B Nov 3, 2019 </p>
                 
              </div>
            </div>
            <div class="carousel-item">
              <div class="carousel-caption">
                <p> "OMG, This actually works! Had to go through 3 coupon codes for this particular store and then...BAM! One worked and I saved 15% off my purchase. Thank you sooooo much :-D"Kirra B Nov 3, 2019 </p>
              </div>
            </div>
            <div class="carousel-item">
              <div class="carousel-caption">
                <p> "OMG, This actually works! Had to go through 3 coupon codes for this particular store and then...BAM! One worked and I saved 15% off my purchase. Thank you sooooo much :-D"Kirra B Nov 3, 2019 </p>
              </div>
            </div>
          </div> <a class="carousel-control-prev" href="#demo" data-slide="prev"> <i class='fa fa-angle-left'></i> </a> <a class="carousel-control-next" href="#demo" data-slide="next"> <i class='fa fa-angle-right'></i> </a>
        </div>
        </div>
    </div>-->
    <!------------------partners------------------>
  <!--  <div class="container about pt-4 pb-4 mb-4">
        <h3 class="mb-3 pt-4">Partner with us</h3>
        <p>Partner with us to extend your reach to our audience of <span>over 900,000 qualified online shoppers,</span> and our email database that reaches <span>more than 200,000 subscribers</span> who are waiting to receive their next deal.</p>
      <h3 class="mb-3">Why partner with us?</h3>
      <p>Increase your conversion rate by up to 33% by integrating a coupon code into your next campaign. Shoppers love to get the best deal possible, and offering a coupon code is one of the best ways to accelerate the journey of your customers through your shopping cart.</p>
        <p>Your competitors are already doing it. We're already publishing coupon codes for over 100,000 online stores, and 76% of stores are planning on offerring more discounts in the next year than the year before.</p>
        <p>Help your customers find what they are looking for. 94% of shoppers search for deals before buying online. You can gain greater control over the deals they see, and which products they end up purchasing.</p>
      <p>If you're interested in a partnership, send an email to hello@wethrift.com or view our submission page for more information about getting your store listed on Wethrift.</p>
    </div>-->
    <!-----------end partners----------->

           
    @include('front_layout.footer')

@endsection
