@extends('Admin::layouts.app')

@section('content')
 <!-- Wrapper Start -->
    <div class="wrapper">
       <!-- Navbar Start -->
       @include('Admin::layouts.navbar')
        <!-- Navbar End -->

         <!-- Sidebar sart -->
          @include('Admin::layouts.sidebar')
        <!-- Sidebar End -->
    <!-- Main Container Start -->
        <main class="main--container">
            <!-- Page Header Start -->
            <section class="page--header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Page Title Start -->
                            <h2 class="page--title h5">Subscribers</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><span>Subscribers</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Page Header End -->

            <!-- Main Content Start -->
            <section class="main--content">
                <div class="panel">
                    <!-- Records Header Start -->
                    <div class="records--header">
                        
                        <div class="title">
                        <!--  <a href="javascript:void(0);" id="back-user-list" class="m-4 fa fa-arrow-left" style="color: black"> Back</a>  
                        -->    
                        </div>
                        <div class="actions">
                            <form action="{{url('/subscribers')}}" method="get" class="search">
                                {{-- csrf_field() --}}
                                <input id='search-stor1e' type="text" class="form-control" name="email" placeholder="Email..." required value="@if(isset($_GET['email'])) {{$_GET['email']}} @endif">
                                <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        
                    </div>
                    <!-- Records Header End -->
                </div>

                <div class="panel">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </p>
                            
                        </div>
                    @endif
                    @if ($message = Session::get('error'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </p>
                            
                        </div>
                    @endif
                    <!-- Records List Start -->
                    <div class="records--list" data-title="Subscribers Listing">
                        <table id="recordsListView">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Email</th>
                                    <th>Store</th>
                                    <th class="not-sortable">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;  
                                ?>  
                              @foreach($subscribers as $subscriber)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        <a href="javascript:void(0)" class="btn-link">{{$subscriber->mail}}</a>
                                    </td>
                                    <td>
                                        @if(strlen($subscriber->stores) > 125) 
                                            {{mb_substr($subscriber->stores,0,125)}}<a href="javascript:void(0)" class="view_subscriber_stores" data-email="{{$subscriber->mail}}" data-stores="{{$subscriber->stores}}">More</a>
                                        @else
                                            {{$subscriber->stores}}
                                        @endif
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Are you really want to delete this Subscriber')" action="{{url('/delete-subscriber/')}}" method="post">
                                            {!! csrf_field() !!} 
                                            <input type="hidden" value="{{$subscriber->mail}}" name="email">
                                            <button type="submit" style="border: none;outline: none !important;cursor:pointer;" class="label label-danger" >Remove</button>
                                        </form>
                                       <!--<div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="javascript:void(0)" class="dropdown-item"><button class="btn btn-rounded btn-outline-info btn-st view_subscriber_stores" data-email="{{$subscriber->mail}}" data-stores="{{$subscriber->stores}}">View</button></a>
                                             
                                                <form onsubmit="return confirm('Are you really want to delete this Subscriber')" style="margin-left: 24px;" action="{{url('/delete-subscriber/')}}" method="post">
                                                {!! csrf_field() !!} 
                                                    <input type="hidden" value="{{$subscriber->mail}}" name="email">
                                                    <button type="submit" id="delete_btn" class="btn btn-rounded btn-outline-info btn-st" >Delete</button>
                                                </form>
                                            </div>
                                        </div>-->
                                    </td>
                                </tr>
                                <?php $i++; ?>
                              @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- Records List End -->
                </div> 
                <div id="subscriberStores" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content" style="color:#000">
                      <!--<div class="modal-header">
                        
                        <h4 class="modal-title">Modal Header</h4>
                      </div>-->
                      <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <p class="popup_heading"></p>
                        <p class="popup_store_listingg" style="max-height: 300px;overflow: auto;"></p>
                      </div>
                      <!--<div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>-->
                    </div>
                  </div>
                </div> 
            </section>
            <!-- Main Content End -->
    <!-- footer -->
       @include('Admin::layouts.main_footer')
     <!-- end footer -->
      <!-- Scripts -->
       @include('Admin::layouts.footer')
     <!-- Scripts -->
     <script>
        jQuery(".view_subscriber_stores").click(function(){
            var email = $(this).attr('data-email');
            var stores = $(this).attr('data-stores');
            $("#subscriberStores .popup_heading").html("Subscribed stores of <b>"+email+"</b>");
            var stores_array = stores.split(', ');
            console.log(stores_array);
            var stores_listing = "<ul>";
            $.each(stores_array, function( index, value ) {
                stores_listing += "<li>"+value+"</li>";
            });
            stores_listing += "</ul>";
             $("#subscriberStores .popup_store_listingg").html(stores_listing);
            $('#subscriberStores').modal('show');
        });
        
    </script>
@endsection