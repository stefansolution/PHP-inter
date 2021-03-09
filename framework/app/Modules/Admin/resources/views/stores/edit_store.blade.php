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
                            <h2 class="page--title h5">Stores</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/stores') }}">Stores</a></li>
                                <li class="breadcrumb-item active"><span>Edit Store</span></li>
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
                            <h6 class="h6">Edit Store</h6>
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
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </p>
                                        
                                    </div>
                                @endif
                                
  
                                <form id="edit-store-form" action="{{ url('/stores/'.$store->id) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    
                                    {{Method_field('PUT')}}
                                     <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Store image:</span>
                                        
                                        
                                        <div class="col-md-9">
                                            <input type="file" name="image" value="{{$store->image}}" >
                                            @if($store->image)
                                                <img src="{{url('/framework/public/assets/store_images/'.$store->image)}}" alt="image" width="100" height="100">
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Category*:</span>
                                        <div class="col-md-9">
                                            <select name="category[]" id="category" class="form-control selectpicker" multiple required>
                                                    <option value="">Please select category</option>
                                                    @foreach($categories as $cat)
                                                       <option value="{{$cat->id}}"{{(in_array($cat->id,$catIds)) ? 'selected' : ''}}>{{$cat->category_name}}</option> 
                                                    @endforeach       
                                                </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Store Name*: </span>
                                        <div class="col-md-9">
                                            <input type="text" value="{{$store->store_name}}"  name="store_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Domain*: </span>
                                        <div class="col-md-9">
                                            <input type="text"  name="domain" class="form-control" value="{{$store->domain}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Special url: </span>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="https://www.example.com" value="{{$store->special_url}}" name="special_url" class="form-control">
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <span class="label-text col-md-3 col-form-label">Reveal code: </span>
                                        <div class="col-md-9">
                                        @if($store->reveal_code==1)   
                                            <input type="checkbox" value="{{$store->reveal_code}}" checked  name="reveal_code">
                                        @else
                                        <input type="checkbox" value="{{$store->reveal_code}}"  name="reveal_code">
                                        @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Description*: </span>
                                        <div class="col-md-9">
                                            <textarea  name="description" rows="4" cols="50" class="form-control">{{$store->description}}</textarea>
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
                                                  <option value="{{$s}}"@if($store->status==$s){{'selected'}}@endif>{{$s_value}}</option>
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
