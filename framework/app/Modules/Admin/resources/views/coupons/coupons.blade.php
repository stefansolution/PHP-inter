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
                            <h2 class="page--title h5">coupons</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active"><span>Coupons</span></li>
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
                        </div>
                        <div class="actions">
                            <form action="{{url('/coupons')}}" method="get" class="search">
                                {{ csrf_field() }}
                                <input id='search-coupon' type="text" class="form-control" name="q" placeholder="Store name..." required>
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
                    <div class="records--list" data-title="Coupon Listing">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">Id</th>
                              <th scope="col">Store Name</th>
                              <th scope="col">Code</th>
                               <th scope="col">Coupon Used</th>
                              <th scope="col">Status</th>
                              <th scope="col not-sortable">Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                           @php $i = 1;  @endphp  
                          @foreach($coupons as $coupon)
                            <tr>
                              <td>{{$coupon->id}}</td>
                              <td>
                                    @foreach($stores as $store)
                                    @if($store->id==$coupon->store_id)
                                        <a href="{{url('/coupons/'.$coupon->id.'/edit')}}" store-id="{{$coupon->store_id}}" class="btn-link">{{$store->store_name}}</a>
                                    @endif
                                    @endforeach
                                </td>
                                <td> <a href="{{url('/coupons/'.$coupon->id.'/edit')}}" class="btn-link">{{$coupon->code}}</a></td>
                                <td> <a href="{{url('/coupons/'.$coupon->id.'/edit')}}" class="btn-link">{{$coupon->coupon_used}}</a></td>
                              @php
                                    $status=array('0'=>'Disable','1'=>'Enable');
                                    @endphp
                                    <td>
                                    @foreach($status as $s => $s_value)
                                       @if($coupon->status==$s)
                                            <a href="{{url('/coupons/'.$coupon->id.'/edit')}}" class="btn-link">
                                    @if($s==1)
                                    <span class="label label-success">{{$s_value}}</span></a>
                                    @else
                                    <span class="label label-danger">{{$s_value}}</span>
                                    @endif      
                                        @endif
                                    @endforeach 
                                </td>
                                <td>
                                    <div class="dropleft">
                                        <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                        <div class="dropdown-menu">
                                            <a href="{{url('/coupons/'.$coupon->id.'/edit')}}" class="dropdown-item"><button class="btn btn-rounded btn-outline-info btn-st">Edit</button></a>
                                         
                                            <form style="margin-left: 24px;" action="{{url('/coupons/'.$coupon->id)}}" method="post">
                                            {!! csrf_field() !!} 
                                            {{Method_field('DELETE')}}
                                                <button type="submit" id="delete_btn" class="btn btn-rounded btn-outline-info btn-st" onClick="return confirm('Are you really want to delete this Category and it's custom fields)" >Delete</button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @php $i++; @endphp
                              @endforeach
                          </tbody>
                        </table>
                        <div>
                            {{$coupons->appends(request()->toArray())->links()}}
                        </div>
                         
                    </div>
                    
                    
                    <!-- Records List End -->
                </div>
            </section>
            <!-- Main Content End -->
    <!-- footer -->
       @include('Admin::layouts.main_footer')
     <!-- end footer -->
      <!-- Scripts -->
       @include('Admin::layouts.footer')
     <!-- Scripts -->
@endsection