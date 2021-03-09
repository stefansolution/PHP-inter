<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="robots" content="noindex, nofollow" />

    <!--<title><?php echo e(config('app.name', 'Admin | ExtensionBuyer')); ?></title>-->
    <title>Admin | <?php echo Config::get('constants.copy_right'); ?></title>

    <!-- Scripts -->
    <!-- <script src="<?php echo e(asset('js/app.js')); ?>" defer></script> -->

    <!-- ==== Document Meta ==== -->
    <meta name="author" content="">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- ==== Favicon ==== -->
    <link rel="icon" href="<?php echo e(asset('admin-assets/favicon.png')); ?>" type="<?php echo e(asset('admin/image/png')); ?>">

    <!-- ==== Google Font ==== -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700%7CMontserrat:400,500">
    
    <!--<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">-->
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/fontawesome-all.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/jquery-ui.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/perfect-scrollbar.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/morris.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/jquery-jvectormap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/horizontal-timeline.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/weather-icons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/dropzone.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/ion.rangeSlider.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/ion.rangeSlider.skinFlat.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/datatables.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/fullcalendar.min.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/datatables.min.css')); ?>">
    

    
    <!-- Page Level Stylesheets -->
</head>


<body >
   <!--  <div id="app">-->
    <?php echo $__env->yieldContent('content'); ?> 
    <!-- </div> -->
</body>
</html>
<?php /**PATH /home/adsrwopw/dealrated.com/framework/app/Modules/Admin/resources/views/layouts/app.blade.php ENDPATH**/ ?>