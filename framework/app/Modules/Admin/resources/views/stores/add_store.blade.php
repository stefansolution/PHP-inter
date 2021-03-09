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
                                <li class="breadcrumb-item active"><span>Add Stores</span></li>
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
                            <h6 class="h6">Add Stores</h6>
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
                                
  
                                <form id="add-store-form" action="{{ url('/stores') }}" method="post" enctype="multipart/form-data" >
                                    {{ csrf_field() }} 
                                    
                                     <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Store image:</span>
                                        <div class="col-md-9">
                                            <input type="file" name="image" >
                                        </div>
                                    </div>    
                                     <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Category*:</span>
                                        <div class="col-md-9">
                                            <select name="category[]"  id="category" class="form-control selectpicker" multiple required>
                                                <!--<option value="">Please select category</option>-->
                                                @foreach($categories as $cat)
                                                   <option value="{{$cat->id}}">{{$cat->category_name}}</option> 
                                                @endforeach       
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Store Name*: </span>
                                        <div class="col-md-9">
                                            <input type="text"  name="store_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Domain*: </span>
                                        <div class="col-md-9">
                                            <input type="text"  name="domain" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Special url: </span>
                                        <div class="col-md-9">
                                            <input type="url" placeholder="https://www.example.com" value="{{old('special_url')}}" name="special_url" class="form-control">
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <span class="label-text col-md-3 col-form-label">Reveal code: </span>
                                        <div class="col-md-9">
                                            <input type="checkbox"  name="reveal_code">
                                           
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Description*: </span>
                                        <div class="col-md-9">
                                            <textarea  name="description" rows="4" cols="50" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    
                                   
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Status*:</span>
                                        <div class="col-md-9">
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Please Select Status</option>
                                                   <option value="1">Enable</option>     
                                                   <option value="0">Disable</option>
                                                  
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
