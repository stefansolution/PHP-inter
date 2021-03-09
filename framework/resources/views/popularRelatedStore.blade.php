<div class="row top_categories pb-3 mb-3">
    <div class="container pb-3 mb-3">
        <div class="row mt-3 pt-3">
            <div class="col-md-4 col-xs-12 list_categories">
                @if(count($popularstore)>0)
              <h4 class="mb-3">Popular related stores</h4>
               <ul class="p-0">
                     @foreach($popularstore as $store)  
                    <li><a href="{{url('store/'.$store->slug)}}"> {{$store->store_name}} </a></li>
                    @endforeach
                </ul>
                @endif
          </div>
          <div class="col-md-4 col-xs-12 list_categories">
              @if(count($newrelatedstores)>0)
              <h4 class="mb-3">New related stores</h4>
               <ul class="p-0">
                @foreach($newrelatedstores as $store)  
                <li><a href="{{url('store/'.$store->slug)}}"> {{$store->store_name}} </a></li>
                @endforeach
             </ul>
             @endif
                </div>
            <div class="col-md-4 col-xs-12 list_categories">
                @if(count($morerelatedstores)>0)
               <h4 class="mb-3">More related stores</h4>
               <ul class="p-0">
                @foreach($morerelatedstores as $store)  
                <li><a href="{{url('store/'.$store->slug)}}"> {{$store->store_name}} </a></li>
                @endforeach
             </ul>
             @endif
           </div>
        </div>
    </div>
</div>