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
                            <h2 class="page--title h5">Coupons</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/stores') }}">Coupons</a></li>
                                <li class="breadcrumb-item active"><span>Edit Coupons</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Page Header End -->

            <!-- Main Content Start -->
            <section class="main--content">
                <div class="panel">

                    <!-- Edit Product Start -->
                    <div class="records--body">
                        <div class="title">
                            <h6 class="h6">Edit Coupons</h6>
                        </div>

                        <!-- Tab Content Start -->
                        <div class="tab-content">
                            <!-- Tab Pane Start -->
                            <div class="tab-pane fade show active" id="tab01">
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
                                            <button type="button"  class="close " data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </p>
                                        
                                    </div>
                                @endif
                                
  
                                <form id="edit-coupon-form" action="{{ url('/coupons/'.$coupon->id) }}" method="post">
                                    {{ csrf_field() }} 
                                     {{Method_field('PUT')}}
                                     
                                     <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Store*:</span>
                                        <div class="col-md-9 ui-widget">
                                            <input type="hidden" id="storeId" name="storeId" value="{{$coupon->store_id}}" >
                                            <input type="text" class="form-control" id="store" name="store_name" value="{{$store->store_name}}">
                                            <ul class="suggestion-container">
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Code*: </span>
                                        <div class="col-md-9">
                                            <input type="text"  name="code" value="{{$coupon->code}}" class="form-control">
                                        </div>
                                    </div>
                                    @php
                                    $discount_type=array('1'=>'%','0'=>'$')
                                    @endphp
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Coupon Off*: </span>
                                        <div class="col-md-5">
                                            <input type="text"  name="coupon_off" value="{{$coupon->coupon_off}}" class="form-control">
                                        </div>
                                         <div class="col-md-4">    
                                            <select name="discount_type" id="discount_type" class="form-control" required>
                                                
                                            <option value="">Please Select discount Type </option>
                                         @foreach($discount_type as $s => $s_value)
                                                  <option value="{{$s_value}}"@if($coupon->discount_type==$s_value){{'selected'}}@endif>{{$s_value}}</option>
                                        @endforeach          
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Avg saving: </span>
                                        <div class="col-md-9">
                                            <input type="text" value="{{$coupon->avg_saving}}" name="avg_saving" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Description: </span>
                                        <div class="col-md-9">
                                            <textarea  name="description" rows="4" cols="50" class="form-control">{{$coupon->description}}</textarea>
                                        </div>
                                    </div>
                                    
                                   
                                     @php
                                    $status=array('1'=>'Enable','0'=>'Disable')
                                    @endphp
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Status*:</span>
                                        <div class="col-md-9">
                                            <select name="status" class="form-control" required>
                                                <option value="">Please Select Status</option>
                                                  @foreach($status as $s => $s_value)
                                                  <option value="{{$s}}"@if($coupon->status==$s){{'selected'}}@endif>{{$s_value}}</option>
                                                 @endforeach 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-9 offset-md-3">
                                            <button type="submit" class="btn btn-rounded btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Tab Pane End -->
                        </div>
                        <!-- Tab Content End -->
                    </div>
                    <!-- Edit Product End -->
                    
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