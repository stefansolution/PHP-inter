

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
                            <h2 class="page--title h5">Stores</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/stores')); ?>">Stores</a></li>
                                <li class="breadcrumb-item active"><span>Edit Store</span></li>
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
                            <h6 class="h6">Edit Store</h6>
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

                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </p>
                                        
                                    </div>
                                <?php endif; ?>
                                
  
                                <form id="edit-store-form" action="<?php echo e(url('/stores/'.$store->id)); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    
                                    <?php echo e(Method_field('PUT')); ?>

                                     <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Store image:</span>
                                        
                                        
                                        <div class="col-md-9">
                                            <input type="file" name="image" value="<?php echo e($store->image); ?>" >
                                            <?php if($store->image): ?>
                                                <img src="<?php echo e(url('/framework/public/assets/store_images/'.$store->image)); ?>" alt="image" width="100" height="100">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Category*:</span>
                                        <div class="col-md-9">
                                            <select name="category[]" id="category" class="form-control selectpicker" multiple required>
                                                    <option value="">Please select category</option>
                                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <option value="<?php echo e($cat->id); ?>"<?php echo e((in_array($cat->id,$catIds)) ? 'selected' : ''); ?>><?php echo e($cat->category_name); ?></option> 
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
                                                </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Store Name*: </span>
                                        <div class="col-md-9">
                                            <input type="text" value="<?php echo e($store->store_name); ?>"  name="store_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Domain*: </span>
                                        <div class="col-md-9">
                                            <input type="text"  name="domain" class="form-control" value="<?php echo e($store->domain); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Special url: </span>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="https://www.example.com" value="<?php echo e($store->special_url); ?>" name="special_url" class="form-control">
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <span class="label-text col-md-3 col-form-label">Reveal code: </span>
                                        <div class="col-md-9">
                                        <?php if($store->reveal_code==1): ?>   
                                            <input type="checkbox" value="<?php echo e($store->reveal_code); ?>" checked  name="reveal_code">
                                        <?php else: ?>
                                        <input type="checkbox" value="<?php echo e($store->reveal_code); ?>"  name="reveal_code">
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Description*: </span>
                                        <div class="col-md-9">
                                            <textarea  name="description" rows="4" cols="50" class="form-control"><?php echo e($store->description); ?></textarea>
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
                                                  <option value="<?php echo e($s); ?>"<?php if($store->status==$s): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($s_value); ?></option>
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

<?php echo $__env->make('Admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adsrwopw/dealrated.com/framework/app/Modules/Admin/resources/views/stores/edit_store.blade.php ENDPATH**/ ?>