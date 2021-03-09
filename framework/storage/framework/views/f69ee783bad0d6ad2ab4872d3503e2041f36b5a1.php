<div class="coupon-list-container ">
  <?php if($coupons): ?>
  <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="coupon-list-row" index="<?php echo e($coupon['id']); ?>" couponid="<?php echo e($coupon['coupon_id']); ?>">
        <div class="coupon-info-container">
            <img class="coupon-logo" src="<?php echo e($assets_front); ?>/assets/images/loading70x70.gif" alt="<?php echo e($coupon['Storedetails']->store_name); ?> discount code" data-src="<?php echo e($assets_front); ?>/assets/store_images/<?php echo e($coupon['Storedetails']->image); ?>">
            <?php if($coupon['Storedetails']->special_url): ?>
                 <a class="coupon-info mob-order-1" href="<?php echo e($coupon['Storedetails']->special_url); ?>">
            <?php else: ?>
             <a class="coupon-info mob-order-1" href="https://dealrated.com/store/<?php echo e($coupon['Storedetails']->slug); ?>">
            <?php endif; ?>     
                <div class="coupon-heading">
                <?php echo e($coupon['Storedetails']->store_name); ?>

                </div>
                <div class="coupon-line-1"><?php echo e($coupon['description']); ?></div>
                <div class="coupon-domain">at <strong><?php echo e($coupon['Storedetails']->domain); ?></strong></div>
            </a>
        </div>
        <div class="coupon-feature  mob-order-3 discovered">
            <div class="coupon-feature-title">Discovered</div>
            <div class="coupon-feature-value"><?php echo e($coupon['discovered']); ?></div>
        
        </div>
        <div class="coupon-feature mob-order-4">
            <div class="coupon-feature-title ">Coupon used</div>
            <div class="coupon-feature-value">
                
            <?php if($coupon['coupon_used']>0): ?>
             <span class="coupon_used"><?php echo e($coupon['coupon_used']); ?></span> times
            <?php endif; ?>
            </div>
        </div>
        <div class="coupon-feature mob-order-4">
            <div class="coupon-feature-title">Last used</div>
            <div class="coupon-feature-value"> Today
            </div>
        </div>
        <div class="coupon-button mob-order-4 copy-copon" store-slug="<?php echo e($coupon['Storedetails']->slug); ?>" coupon="<?php echo e($coupon['code']); ?>">
            Show code
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
<?php endif; ?>
    
 </div>  
<?php /**PATH E:\xampp\htdocs\dealrated.com\framework\resources\views/coupon.blade.php ENDPATH**/ ?>