<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('front_layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
     <?php if($message = Session::get('success')): ?>
        <div class="offset-md-4 col-md-4 alert alert-success ">
            <p><?php echo e($message); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </p>
            
        </div>
    <?php endif; ?>
    <!----------------------section-------------------->
        <div class="container content text-center text-uppercase pt-4 pb-4">
             <p>DEALRATED HELPS SHOPPERS TO SAVE MONEY  <br> AT THOUSANDS OF STORES ONLINE.</p>
        </div>
        <!--------------end section-------------->
        <!----------------------stores----------------->
        <div class="row pt-4 pb-4 favourite_stores">
            <div class="container pt-4 mt-4">
                <h1 class="text-center mb-4 text-white">Coupons and Discount Codes at stores we love ❤️</h1>
                <div class="row mb-4 mt-4 pt-4 pb-4">
                   <?php $__currentLoopData = $fav_stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-4 codes mb-4">

                        <div class="stores">
                           <a href="<?php echo e(url('store/'.$store->slug)); ?>">
                            <div class="row">
                               <div class="col-xs-4 p-0 pl-2 pr-2 text-center">
                                  <img src="<?php echo e($assets_front); ?>/assets/images/loading70x70.gif" alt="<?php echo e($store->store_name); ?>" data-src="<?php echo e($assets_front); ?>/assets/store_images/<?php echo e($store->image); ?>" />
                               </div>
                               <div class="col-xs-8 pt-2 pl-2 pr-2">
                                   <h4><?php echo e($store->store_name); ?></h4>
                                   <p><?php echo e($store->domain); ?></p>
                               </div>
                            </div>
                          </a>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        
        <!---------------------top coupons------------------>
        <div class="row top_coupons pb-4 mb-4 pt-4 mt-4">
            <div class="container mb-4 mt-4">
                <h2 class="text-center mb-4">Today's top coupons and discount codes</h2>
                <?php echo $__env->make('coupon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

        </div>
        
        <!--------------------top stores-------------------------->
        <div class="row top_stores pb-4 mb-4">
             <div class="container">
                   <h3 class="text-center mb-4"><b>Find more top coupons and discount</b><br> codes at today's top stores</h3>
                   <div class="row">
                    <?php $__currentLoopData = $topstores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="col-md-3 col-xs-12 left product">
                        <a href="<?php echo e(url('store/'.$store->slug)); ?>">
                          <div class="coupon_stores text-center">
                              
                            <img src="<?php echo e($assets_front); ?>/assets/images/loading150x150.gif" alt="<?php echo e($store->store_name); ?>" data-src="<?php echo e($assets_front); ?>/assets/store_images/<?php echo e($store->image); ?>"/>
                            <h4><?php echo e($store->store_name); ?></h4>
                            <a href="<?php echo e(url('store/'.$store->slug)); ?>"><?php echo e($store->domain); ?></a>
                          </div>
                        </a>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </div>
             </div>
        </div>
        <!------------------------top categories------------------>
        <div class="row top_categories pb-3 mb-3">
             <div class="container pb-3 mb-3">
                <h3 class="text-center mb-4"><b>Today's top categories</b></h3>
                <div class="row mt-3 pt-3">
                   <?php $__currentLoopData = $categories->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 col-xs-12 list_categories">
                        <ul class="p-0">
                          <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(url('/category/'.$category->slug.'/')); ?>"><?php echo e($category->category_name); ?></a></li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
             </div>
        </div>  
    <?php echo $__env->make('front_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adsrwopw/dealrated.com/framework/resources/views/index.blade.php ENDPATH**/ ?>