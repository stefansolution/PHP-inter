
      <?php if($countexpired!=0): ?>
      <h5 class="mt-4 mb-3 text-center text-uppercase" id="q6"><?php echo e($countexpired); ?> old and expired coupon codes for <?php echo e($storedetail->store_name); ?></h5>
      <?php endif; ?>
     <?php $__currentLoopData = $expierdcoupon; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expierd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     
      <div class="coupon-list-row coupons_used expired-coupons" CouponId="<?php echo e($expierd['coupon_id']); ?>" index="<?php echo e($expierd['id']); ?>">
        <div class="coupon-info-container">
           <img class="coupon-logo" src="<?php echo e($assets_front); ?>/assets/store_images/<?php echo e($expierd['Storedetails']->image); ?>"  alt="<?php echo e($expierd['Storedetails']->store_name); ?> discount code"/>
          <a class="coupon-info mob-order-1 coupon-store" special-url="<?php echo e($expierd['Storedetails']->special_url); ?>" href="https://dealrated.com/store/<?php echo e($expierd['Storedetails']->slug); ?>#c=<?php echo e($expierd['coupon_id']); ?>">
            <div class="coupon-heading">

            <?php echo e($expierd['Storedetails']->store_name); ?>

            </div>
            <div class="coupon-line-1"><?php echo e($expierd['description']); ?></div>
            <div class="coupon-domain">at <strong><?php echo e($expierd['Storedetails']->domain); ?></strong></div>            
          </a>
        </div>
        <div class="coupon-feature mob-order-4 last-used">
          <div class="coupon-feature-title">Coupon used</div>
          <div class="coupon-feature-value">
            <?php if($expierd['coupon_used']>0): ?>
              <span class="coupon_used"><?php echo e($expierd['coupon_used']); ?></span> times
            <?php endif; ?>
          </div>
        </div>
        <?php if($expierd['Storedetails']->reveal_code==1): ?>
        <div class="coupon-button mob-order-4 reveal-copy-code" store-slug="<?php echo e($expierd['Storedetails']->slug); ?>"  coupon="<?php echo e($expierd['code']); ?>">
            <span>Copy code </span>
            <span><?php echo e($expierd['code']); ?></span>
           
        </div>
        
        <?php else: ?>
        <div class="coupon-button mob-order-4 store-copy-copon" store-slug="<?php echo e($expierd['Storedetails']->slug); ?>"  coupon="<?php echo e($expierd['code']); ?>">
            Show code
        </div>
        <?php endif; ?>
      </div>  
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!--</div>
  </div>--><?php /**PATH /home/adsrwopw/dealrated.com/framework/resources/views/expiredCoupon.blade.php ENDPATH**/ ?>