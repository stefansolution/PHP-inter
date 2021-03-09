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
                            <h2 class="page--title h5">Coupon</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/coupons') }}">Coupons</a></li>
                                <li class="breadcrumb-item active"><span>Add Coupons</span></li>
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
                            <h6 class="h6">Add Coupons</h6>
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
                                
  
                                <form id="add-coupon-form" action="{{ url('/coupons') }}" method="post">
                                    {{ csrf_field() }} 
                                     <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Store*:</span>
                                        <div class="col-md-9 ui-widget">
                                            <input type="hidden" id="storeId" name="storeId" >
                                            <input type="text" class="form-control addStoreField" id="store" required name="store_name">
                                            <ul class="suggestion-container">
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Code*: </span>
                                        <div class="col-md-9">
                                            <input type="text" value="{{old('code')}}" name="code" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Coupon Off*: </span>
                                        <div class="col-md-5">
                                            <input type="text" value="{{old('coupon_off')}}" name="coupon_off" class="form-control">
                                        </div>    
                                        <div class="col-md-4">    
                                            <select name="discount_type" id="discount_type" class="form-control" required>
                                                <option value="">Please Select discount Type </option>
                                                    <option value="%" {{ old('discount_type') == '%' ? 'selected' : '' }}>%</option>     
                                                    <option value="0" {{ old('discount_type') == '$' ? 'selected' : '' }}>$</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Avg saving: </span>
                                        <div class="col-md-9">
                                            <input type="text" value="{{old('avg_saving')}}" name="avg_saving" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Description: </span>
                                        <div class="col-md-9">
                                            <textarea  name="description" rows="4" cols="50" class="form-control">{{Request::old('description')}}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Status*:</span>
                                        <div class="col-md-9">
                                            <select name="status" id="status" class="form-control" required>
                                                <option value="">Please Select Status</option>
                                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Enable</option>     
                                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Disable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-9 offset-md-3">
                                            <button type="submit" class="btn btn-rounded btn-success">Save</button>
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