

<?php $__env->startSection('content'); ?>
 <!-- Wrapper Start -->
    <div class="wrapper">
       <!-- Navbar Start -->
       <?php echo $__env->make('Admin::layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Navbar End -->

         <!-- Sidebar sart -->
          <?php echo $__env->make('Admin::layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Sidebar End -->

    <!-- Main Container Start -->
        <main class="main--container">
            <!-- Page Header Start -->
            <section class="page--header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Page Title Start -->
                            <h2 class="page--title h5">Coupons</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/stores')); ?>">Coupons</a></li>
                                <li class="breadcrumb-item active"><span>Edit Coupons</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Page Header End -->

            <!-- Main Content Start -->
            <section class="main--content">
                <div class="panel">

                    <!-- Edit Product Start -->
                    <div class="records--body">
                        <div class="title">
                            <h6 class="h6">Edit Coupons</h6>
                        </div>

                        <!-- Tab Content Start -->
                        <div class="tab-content">
                            <!-- Tab Pane Start -->
                            <div class="tab-pane fade show active" id="tab01">
                                <?php if($message = Session::get('success')): ?>
                                    <div class="alert alert-success">
                                        <p><?php echo e($message); ?>

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </p>
                                        
                                    </div>
                                <?php endif; ?>
                                <?php if($message = Session::get('error')): ?>
                                    <div class="alert alert-danger">
                                        <p><?php echo e($message); ?>

                                            <button type="button"  class="close " data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </p>
                                        
                                    </div>
                                <?php endif; ?>
                                
  
                                <form id="edit-coupon-form" action="<?php echo e(url('/coupons/'.$coupon->id)); ?>" method="post">
                                    <?php echo e(csrf_field()); ?> 
                                     <?php echo e(Method_field('PUT')); ?>

                                     
                                     <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Store*:</span>
                                        <div class="col-md-9 ui-widget">
                                            <input type="hidden" id="storeId" name="storeId" value="<?php echo e($coupon->store_id); ?>" >
                                            <input type="text" class="form-control" id="store" name="store_name" value="<?php echo e($store->store_name); ?>">
                                            <ul class="suggestion-container">
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Code*: </span>
                                        <div class="col-md-9">
                                            <input type="text"  name="code" value="<?php echo e($coupon->code); ?>" class="form-control">
                                        </div>
                                    </div>
                                    <?php
                                    $discount_type=array('1'=>'%','0'=>'$')
                                    ?>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Coupon Off*: </span>
                                        <div class="col-md-5">
                                            <input type="text"  name="coupon_off" value="<?php echo e($coupon->coupon_off); ?>" class="form-control">
                                        </div>
                                         <div class="col-md-4">    
                                            <select name="discount_type" id="discount_type" class="form-control" required>
                                                
                                            <option value="">Please Select discount Type </option>
                                         <?php $__currentLoopData = $discount_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s => $s_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option value="<?php echo e($s_value); ?>"<?php if($coupon->discount_type==$s_value): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($s_value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>          
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Avg saving: </span>
                                        <div class="col-md-9">
                                            <input type="text" value="<?php echo e($coupon->avg_saving); ?>" name="avg_saving" class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Description: </span>
                                        <div class="col-md-9">
                                            <textarea  name="description" rows="4" cols="50" class="form-control"><?php echo e($coupon->description); ?></textarea>
                                        </div>
                                    </div>
                                    
                                   
                                     <?php
                                    $status=array('1'=>'Enable','0'=>'Disable')
                                    ?>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Status*:</span>
                                        <div class="col-md-9">
                                            <select name="status" class="form-control" required>
                                                <option value="">Please Select Status</option>
                                                  <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s => $s_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <option value="<?php echo e($s); ?>"<?php if($coupon->status==$s): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($s_value); ?></option>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-9 offset-md-3">
                                            <button type="submit" class="btn btn-rounded btn-success">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- Tab Pane End -->
                        </div>
                        <!-- Tab Content End -->
                    </div>
                    <!-- Edit Product End -->
                    
                </div>
            </section>
         


            <!-- Main Content End -->
    <!-- footer -->
       <?php echo $__env->make('Admin::layouts.main_footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <!-- end footer -->
      <!-- Scripts -->
       <?php echo $__env->make('Admin::layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <!-- Scripts -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adsrwopw/dealrated.com/framework/app/Modules/Admin/resources/views/coupons/edit_coupon.blade.php ENDPATH**/ ?>