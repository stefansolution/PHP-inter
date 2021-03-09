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
                            <h2 class="page--title h5">Categories</h2>
                            <!-- Page Title End -->

                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/dashboard')); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active"><span>Categories</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Page Header End -->

            <!-- Main Content Start -->
            <section class="main--content">
                <div class="panel">
                    <!-- Records Header Start -->
                    <div class="records--header">
                        
                        <div class="title">
                        <!--  <a href="javascript:void(0);" id="back-user-list" class="m-4 fa fa-arrow-left" style="color: black"> Back</a>  
                        -->    
                        </div>
                        <div class="actions">
                            <form action="<?php echo e(url('/categories')); ?>" method="get" class="search">
                                <?php echo e(csrf_field()); ?>

                                <input id='search-category' type="text" class="form-control" name="category" placeholder="Name..." required>
                                <button type="submit" class="btn btn-rounded"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        
                    </div>
                    <!-- Records Header End -->
                </div>

                <div class="panel">

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
                    <!-- Records List Start -->
                    <div class="records--list" data-title="Categories Listing">
                        <table id="recordsListView">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th class="not-sortable">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;  
                                ?>  
                              <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('/categories/'.$category->id.'/edit')); ?>" class="btn-link"><?php echo e($category->category_name); ?></a>
                                    </td>
                                    <?php
                                    $status=array('0'=>'Disable','1'=>'Enable');
                                    ?>
                                    <td>
                                        <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s => $s_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <?php if($category->status==$s): ?>
                                                <a href="<?php echo e(url('/categories/'.$category->id.'/edit')); ?>" class="btn-link">
                                        <?php if($s==1): ?>
                                        <span class="label label-success"><?php echo e($s_value); ?></span></a>
                                        <?php else: ?>
                                        <span class="label label-danger"><?php echo e($s_value); ?></span>
                                        <?php endif; ?>
                                                    
                                                    
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </td>
                                    
                                    <td>
                                        <div class="dropleft">
                                            <a href="#" class="btn-link" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>

                                            <div class="dropdown-menu">
                                                <a href="<?php echo e(url('/categories/'.$category->id.'/edit')); ?>" class="dropdown-item"><button class="btn btn-rounded btn-outline-info btn-st">Edit</button></a>
                                             
                                                <form style="margin-left: 24px;" action="<?php echo e(url('/categories/'.$category->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?> 
                                                <?php echo e(Method_field('DELETE')); ?>

                                                    <button type="submit" id="delete_btn" class="btn btn-rounded btn-outline-info btn-st" onClick="return confirm('Are you really want to delete this Category and it's custom fields)" >Delete</button>
                                                </form>
                                                
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- Records List End -->
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

<?php echo $__env->make('Admin::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/adsrwopw/dealrated.com/framework/app/Modules/Admin/resources/views/categories/categories.blade.php ENDPATH**/ ?>