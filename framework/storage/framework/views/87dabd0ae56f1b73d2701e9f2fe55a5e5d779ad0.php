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
                            <h2 class="page--title h5">CATEGORIES</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/categories')); ?>">Categories</a></li>
                                <li class="breadcrumb-item active"><span>Add Category</span></li>
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
                            <h6 class="h6">Add Category</h6>
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
                                
  
                                <form id="add-category-form" action="<?php echo e(url('/categories')); ?>" method="post" >
                                    <?php echo e(csrf_field()); ?> 
                                 
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Category Name*: </span>
                                        <div class="col-md-9">
                                            <input type="text"   name="category_name"  class="form-control <?php if ($errors->has('category_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('category_name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                                                <?php if ($errors->has('category_name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('category_name'); ?>
                                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="form-group row">
                                        <span class="label-text col-md-3 col-form-label">Status*:</span>
                                        <div class="col-md-9">
                                            <select name="status" id="status" class="form-control">
                                                <option value="">Please Select Status</option>
                                                   <option value="1">Enable</option>     
                                                   <option value="0">Disable</option>
                                                  
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-9 offset-md-3">
                                            <button type="submit" class="btn btn-rounded btn-success">Save</button>
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

<?php echo $__env->make('Admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adsrwopw/dealrated.com/framework/app/Modules/Admin/resources/views/categories/add_categories.blade.php ENDPATH**/ ?>