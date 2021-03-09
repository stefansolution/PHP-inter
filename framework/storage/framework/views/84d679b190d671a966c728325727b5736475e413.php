<?php $__env->startSection('content'); ?>
 

    <?php echo $__env->make('front_layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!---------------------top coupons------------------>
        
<div class="row top_coupons pb-4 mb-4">
    <div class="container mb-4">
      <?php if(count($coupons)>0): ?>
      <h1 class="text-center mb-4 mt-4">Our top <?php echo e($categoryDetails->category_name); ?> coupons and discount codes</h1>

      <?php echo $__env->make('coupon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php else: ?>
      <h1 class="text-center mb-4 mt-4">Coupons and discount codes not found</h1>
      <?php endif; ?>
  </div>

</div>
<!--------------------top stores-------------------------->

<div class="row top_stores category-store-container pb-4 mb-4"></div>
<!-------------------end top stores--------------------->
           
    <?php echo $__env->make('front_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adsrwopw/dealrated.com/framework/resources/views/category.blade.php ENDPATH**/ ?>