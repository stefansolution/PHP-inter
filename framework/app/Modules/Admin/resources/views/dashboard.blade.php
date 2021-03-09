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
        <main class="main--container" >
            <!-- Page Header Start -->
            <section class="page--header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Page Title Start -->
                            <h2 class="page--title h5">Dashboard</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active"><span>Dashboard</span></li>
                            </ul>
                        </div>

                        
                    </div>
                </div>
            </section>
            <!-- Page Header End -->

            <!-- Main Content Start -->
            <section class="main--content" style="min-height: 330px">
                <div class="row gutter-20">
                    <div class="col-md-4">
                        <div class="panel">
                            <!-- Mini Stats Panel Start -->
                            <div class="miniStats--panel">
                                <div class="miniStats--header bg-darker">
                                    <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#2bb3c0">5,6,9,4,9,5,3,5,9,15,3,2,2,3,9,11,9,7,20,9,7,6</p>

                                    <p class="miniStats--label text-white bg-blue">
                                        <i class="fa fa-level-up-alt"></i>
                                        <!--<span>10%</span>-->
                                    </p>
                                </div>

                                <div class="miniStats--body">
                                    <i class="miniStats--icon fa fa-user text-blue"></i>

                                   <!-- <p class="miniStats--caption text-blue">Monthly</p>-->
                                    <h3 class="miniStats--title h4">Total Stores</h3>
                                    <p class="miniStats--num text-blue">{{$stores}}</p>
                                </div>
                            </div>
                            <!-- Mini Stats Panel End -->
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel">
                            <!-- Mini Stats Panel Start -->
                            <div class="miniStats--panel">
                                <div class="miniStats--header bg-darker">
                                    <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#009378">2,2,3,9,11,9,7,20,9,7,6,5,6,9,4,9,5,3,5,9,15,3</p>

                                    <p class="miniStats--label text-white bg-green">
                                        <i class="fa fa-level-up-alt"></i>
                                        <!--<span>10%</span>-->
                                    </p>
                                </div>

                                <div class="miniStats--body">
                                    <i class="miniStats--icon fa fa-rocket text-green"></i>

                                    <!--<p class="miniStats--caption text-green">Monthly</p>-->
                                    <h3 class="miniStats--title h4">Scraped Stores</h3>
                                    <p class="miniStats--num text-green">{{$scraped_Stores[0]->total_Store}}</p>
                                </div>
                            </div>
                            
                            <!-- Mini Stats Panel End -->
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="panel">
                            <!-- Mini Stats Panel Start -->
                            <!--<div class="miniStats--panel">
                                <div class="miniStats--header bg-darker">
                                    <p class="miniStats--chart" data-trigger="sparkline" data-type="bar" data-width="4" data-height="30" data-color="#e16123">2,2,3,9,11,9,7,20,9,7,6,5,6,9,4,9,5,3,5,9,15,3</p>

                                    <p class="miniStats--label text-white bg-orange">
                                        <i class="fa fa-level-down-alt"></i>
                                        <span>10%</span>
                                    </p>
                                </div>

                                <div class="miniStats--body">
                                    <i class="miniStats--icon fa fa-ticket-alt text-orange"></i>

                                   <p class="miniStats--caption text-orange">Monthly</p>
                                    <h3 class="miniStats--title h4">Scraped Store</h3>
                                    <p class="miniStats--num text-orange">450</p>
                                </div>
                            </div>-->
                            <!-- Mini Stats Panel End -->
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
@endsection
