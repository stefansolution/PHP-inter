<?php
    $adminData = Session::get('adminSessionData');
    $adminId = $adminData['id'];
    $adminName = $adminData['name'];
    $adminEmail = $adminData['email'];
?>
<aside class="sidebar" data-trigger="scrollbar">
    <!-- Sidebar Profile Start -->
    <div class="sidebar--profile">
        <div class="profile--img">
            <a href="profile.html">
                <img src="<?php echo e(asset('admin-assets/img/avatars/01_80x80.png')); ?>" alt="" class="rounded-circle">
            </a>
        </div>

        <div class="profile--name">
            <a href="profile.html" class="btn-link"><?php echo e($adminName); ?></a>
        </div>

        <div class="profile--nav">
            <ul class="nav">
                <li class="nav-item">
                    <a href="<?php echo e(url('/profile')); ?>" class="nav-link" title="User Profile">
                        <i class="fa fa-user"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('/changePassword')); ?>" class="nav-link" title="Password change">
                        <i class="fa fa-lock"></i>
                    </a>
                </li>
                <!--<li class="nav-item">
                    <a href="mailbox_inbox.html" class="nav-link" title="Messages">
                        <i class="fa fa-envelope"></i>
                    </a>
                </li>-->
                <li class="nav-item">
                    <a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="nav-link" title="Logout">
                        <i class="fa fa-sign-out-alt"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Sidebar Profile End -->

    <!-- Sidebar Navigation Start -->
    <div class="sidebar--nav">
        <ul>
            <li>
                <ul>
                    <li class="active">
                        <a href="<?php echo e(url('/dashboard')); ?>">
                            <i class="fa fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-th-list"></i>
                           <span>Manage Categories</span>
                        </a>

                        <ul>
                            <li><a href="<?php echo e(url('/categories')); ?>">Listing</a></li>
                           <li><a href="<?php echo e(url('/categories/create')); ?>">Add Category</a></li>
                        </ul>
                    </li>
                     <li>
                        <a href="#">
                            <i class="fa fa-th"></i>
                            <span>Manage Stores</span>
                        </a>

                        <ul>
                            <li><a href="<?php echo e(url('/stores')); ?>">Listing</a></li>
                             <li><a href="<?php echo e(url('/stores/create')); ?>">Add Store</a></li> 
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-tasks"></i>
                            <span>Manage Coupons</span>
                        </a>

                        <ul>
                            <li><a href="<?php echo e(url('/coupons')); ?>">Listing</a></li>
                             <li><a href="<?php echo e(url('/coupons/create')); ?>">Add Coupon</a></li> 
                        </ul>
                    </li> 
                    <li class="">
                        <a href="<?php echo e(url('/subscribers')); ?>">
                            <i class="fa fa-users"></i>
                            <span>Manage Subscribers</span>
                        </a>
                    </li>
                    
                    
                </ul>
            </li>

        </ul>
    </div>
    <!-- Sidebar Navigation End -->


</aside>
<!-- Sidebar End --><?php /**PATH /home/adsrwopw/dealrated.com/framework/app/Modules/Admin/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>