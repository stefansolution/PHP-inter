<div class="container mb-4s">
      <?php if(count($stores)>0): ?>
         <h2 class="text-center mb-4">Find more top <?php echo e($categoryDetails->category_name); ?> coupons and<br> discount codes at today's top stores</h2>
       <div class="row">
        <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(url('store/'.$store->slug)); ?>">
          <div class="col-md-3 col-xs-12 left product">
            <div class="coupon_stores text-center">
              <img src="<?php echo e($assets_front); ?>/assets/store_images/<?php echo e($store->image); ?>" alt="<?php echo e($store->store_name); ?>"/>
            <h4><?php echo e($store->store_name); ?> </h4>
            <a href="<?php echo e(url('store/'.$store->slug)); ?>"><?php echo e($store->domain); ?></a>
          </div>
         </div>
         </a>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
       </div>
    <?php endif; ?>
   </div><?php /**PATH /home/adsrwopw/dealrated.com/framework/resources/views/categoryStore.blade.php ENDPATH**/ ?>