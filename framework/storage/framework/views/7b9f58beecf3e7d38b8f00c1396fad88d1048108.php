<!-----------------------header------------------------->
<div class="container">
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
	  <a class="navbar-brand" href="<?php echo e(url('/')); ?>"><img src="<?php echo e($assets_front); ?>/assets/images/dealrated-logo2.jpg" ></a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
		<span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="collapsibleNavbar">
	      
            <form action="<?php echo e(url('/searchCouponDeal')); ?>" class="navbar-form navbar-center" id="searchCouponDeal" method="get">
                <div class="input-group mb-3 error-show ui-widget">
                    <input id="search" name="q" class="form-control" placeholder="Search Coupons & Deals" value="<?php echo e(request('q')); ?>" >
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
	                <?php $__currentLoopData = array_chunk($nav_categories,2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		<div class="col-sm-4">
                		    <ul class="multi-column-dropdown">
                		    	<?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                		        <li><a href="<?php echo e(url('/category/'.$category->slug.'/')); ?>"><?php echo e($category->category_name); ?></a></li>
                		         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                		    </ul>
                		</div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	            </div>
	        </ul>
		 </li>
		  <!-- <li class="nav-item">
			<a class="nav-link" href="#">SUBMIT COUPONS</a>
		  </li> -->
		  <li class="nav-item">
			<a class="nav-link" href="<?php echo e(url('/about')); ?>">ABOUT</a>
		  </li>    
		</ul>
	  </div>  
	</nav>
</div>

<!------------------end header------------------->
<hr><?php /**PATH E:\xampp\htdocs\dealrated.com\framework\resources\views/front_layout/navbar.blade.php ENDPATH**/ ?>