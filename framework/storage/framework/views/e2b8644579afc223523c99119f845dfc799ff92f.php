<div class="row top_categories pb-3 mb-3">
    <div class="container pb-3 mb-3">
        <div class="row mt-3 pt-3">
            <div class="col-md-4 col-xs-12 list_categories">
                <?php if(count($popularstore)>0): ?>
              <h4 class="mb-3">Popular related stores</h4>
               <ul class="p-0">
                     <?php $__currentLoopData = $popularstore; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                    <li><a href="<?php echo e(url('store/'.$store->slug)); ?>"> <?php echo e($store->store_name); ?> </a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
                <?php endif; ?>
          </div>
          <div class="col-md-4 col-xs-12 list_categories">
              <?php if(count($newrelatedstores)>0): ?>
              <h4 class="mb-3">New related stores</h4>
               <ul class="p-0">
                <?php $__currentLoopData = $newrelatedstores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                <li><a href="<?php echo e(url('store/'.$store->slug)); ?>"> <?php echo e($store->store_name); ?> </a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </ul>
             <?php endif; ?>
                </div>
            <div class="col-md-4 col-xs-12 list_categories">
                <?php if(count($morerelatedstores)>0): ?>
               <h4 class="mb-3">More related stores</h4>
               <ul class="p-0">
                <?php $__currentLoopData = $morerelatedstores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                <li><a href="<?php echo e(url('store/'.$store->slug)); ?>"> <?php echo e($store->store_name); ?> </a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </ul>
             <?php endif; ?>
           </div>
        </div>
    </div>
</div><?php /**PATH /home/adsrwopw/dealrated.com/framework/resources/views/popularRelatedStore.blade.php ENDPATH**/ ?>