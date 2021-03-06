@extends('front_layout.header')

@section('content')
 

    @include('front_layout.navbar')
        
    <div class="container content text-center text-uppercase pt-3 pb-3">
      <!--<p>DEALRATED HELPS SHOPPERS TO FIND SAVINGS AT ALMOST ANY STORE ONLINE.</p>-->
      
    </div>
    <!--------------end section-------------->

    <!---------------------about------------->
    <div class="row about_sec pt-4">
      <div class="container pt-4 mt-3 mb-4 pb-4">
         <h3 class="mb-3 text-center"><b>Privacy Policy</b></h3>
      </div>
    </div>
    <!----------------end about------------------>
    <!---------------------testimonial--------------->
    <div class="row testimonial pt-4 pb-4">
        <div class="container pt-3 pb-4 mb-4">
          <p class="text-justify">Your privacy is important to us. It is DealRated's policy to respect your privacy regarding any information we may collect from you across our website,<a href="http://DealRated.com"> http://DealRated.com,</a>  and other sites we own and operate.</p> 
          <p class="text-justify">We only ask for personal information when we truly need it to provide a service to you. We collect it by fair and lawful means, with your knowledge and consent. We also let you know why we’re collecting it and how it will be used.</p> 
          <p class="text-justify">We only retain collected information for as long as necessary to provide you with your requested service. What data we store, we’ll protect within commercially acceptable means to prevent loss and theft, as well as unauthorized access, disclosure, copying, use or modification.<br>
              We don’t share any personally identifying information publicly or with third-parties, except when required to by law.</p> 
          <p class="text-justify">Our website may link to external sites that are not operated by us. Please be aware that we have no control over the content and practices of these sites, and cannot accept responsibility or liability for their respective privacy policies.</p> 
          <p class="text-justify">You are free to refuse our request for your personal information, with the understanding that we may be unable to provide you with some of your desired services.</p> 
          <p class="text-justify">Your continued use of our website will be regarded as acceptance of our practices around privacy and personal information. If you have any questions about how we handle user data and personal information, feel free to contact us.</p>
          <p >This policy is effective as of 2 September 2020.</p>
        </div>
    </div>

    @include('front_layout.footer')

@endsection
