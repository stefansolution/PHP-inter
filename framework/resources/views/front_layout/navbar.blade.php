<!-----------------------header------------------------->
<div class="container">
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
	  <a class="navbar-brand" href="{{ url('/')}}"><img src="{{$assets_front}}/assets/images/dealrated-logo2.jpg" ></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="collapsibleNavbar">
	      
            <form action="{{url('/searchCouponDeal')}}" class="navbar-form navbar-center" id="searchCouponDeal" method="get">
                <div class="input-group mb-3 error-show ui-widget">
                    <input id="search" name="q" class="form-control" placeholder="Search Coupons & Deals" value="{{request('q')}}" >
                    <div class="input-group-append searchCoupon">
                      <span type="submit" class="input-group-text"><i class="fa fa-search "></i></span>
                    </div>
                </div>
            </form>
        
	      
	      
		<ul class="navbar-nav ml-auto">
		  <li class="nav-item">
			<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">CATEGORIES</a>
			<ul class="dropdown-menu multi-column columns-3 pt-0">
	            <div class="row">
	                @foreach(array_chunk($nav_categories,2) as $chunk)
                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	@foreach($chunk as $category)
                		        <li><a href="{{url('/category/'.$category->slug.'/')}}">{{$category->category_name}}</a></li>
                		         @endforeach
                		    </ul>
                		</div>
                @endforeach
	            </div>
	        </ul>
		 </li>
		  <!-- <li class="nav-item">
			<a class="nav-link" href="#">SUBMIT COUPONS</a>
		  </li> -->
		  <li class="nav-item">
			<a class="nav-link" href="{{ url('/about')}}">ABOUT</a>
		  </li>    
		</ul>
	  </div>  
	</nav>
</div>

<!------------------end header------------------->
<hr>