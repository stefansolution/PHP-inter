<?php $__env->startSection('content'); ?>
 

    <?php echo $__env->make('front_layout.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
       
    <!---------------------------promo codes------------->
<div class="container content text-center text-uppercase pt-4">
     <p>DEALRATED HELPS SHOPPERS TO SAVE MONEY  <br> AT THOUSANDS OF STORES ONLINE.</p>
    <div class="row pb-4 mb-4 pt-2">
         <div class="col-md-4 col-xs-12"></div>
         <div class="col-md-4 col-xs-12">
         </div>
         <div class="col-md-4 col-xs-12"></div>
    </div>
</div>


<div class="row top_coupons pb-4 mb-4">
    <div class="container mb-4">
     <?php if($countcoupon): ?>
      <h3 class="text-center mb-4 mt-4"><b>(<?php echo e($countcoupon); ?> Discounts & Promo Codes) <?php echo date("F Y");  ?></b></h3>
    <?php echo $__env->make('coupon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
      <h3 class="text-center mb-4 mt-4"><b>Coupons Not Found</b></h3>
    <?php endif; ?>
  </div>

</div>

 
    <?php echo $__env->make('front_layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front_layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adsrwopw/dealrated.com/framework/resources/views/search.blade.php ENDPATH**/ ?>