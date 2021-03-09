<div class="row top_stores pb-4 mb-4 pt-4 mt-4">
    <div class="container">
         <?php if(count($stores)>0): ?>
         <h3 class="text-center mb-4"><b>Find coupons at stores like <?php echo e($storedetail->store_name); ?></b></h3>
       <div class="row">
          <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-3 col-xs-12 left product">
            <a href="<?php echo e(url('store/'.$store->slug)); ?>">
            <div class="coupon_stores text-center">
              <img src="<?php echo e($assets_front); ?>/assets/store_images/<?php echo e($store->image); ?>" alt="<?php echo e($store->store_name); ?>" data-src="" />
              <h4><?php echo e($store->store_name); ?> </h4>
              <a href="<?php echo e(url('store/'.$store->slug)); ?>"><?php echo e($store->domain); ?></a>
            </div>
         </div>
       </a>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
       </div>
       <?php endif; ?>
   </div>
</div><?php /**PATH /home/adsrwopw/dealrated.com/framework/resources/views/relatedStore.blade.php ENDPATH**/ ?>