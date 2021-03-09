<!DOCTYPE html>
<html lang="en">
	<head>
	     <?php if($title!=''): ?>
        <title><?php echo e($title); ?></title>
        <?php else: ?>
        <title>DealRated.com - Coupons, Discounts and Coupon Codes</title>
        <?php endif; ?>
        <?php if($description!=''): ?>
        <meta name="description" content="<?php echo e($description); ?>">
        <?php endif; ?>
        <?php if($meta_url): ?>
        <meta property="og:url" content="<?php echo e($meta_url); ?>">
        <?php endif; ?>
        <?php if($meta_title!=''): ?>
        <meta property="og:title" content="<?php echo e($meta_title); ?>" />
        <?php endif; ?>
        <?php if($meta_description!=''): ?>
        <meta property="og:description" content="<?php echo e($meta_description); ?>" />
        <?php endif; ?>
        <?php if($meta_image!=''): ?>
        <meta property="og:image" content="<?php echo e($meta_image); ?>">
        <?php endif; ?>
        <?php if($base_url): ?>
        <link rel="canonical" href="<?php echo e($base_url); ?>">
        <?php endif; ?>
        
         <?php if($schemaQues!=''): ?>
        <script data-react-helmet="true" type="application/ld+json">
    	  {
    	    "@context": "https://schema.org/",
    	    "@type": "FAQPage",
    	    "mainEntity":<?php echo $schemaQues; ?>

    	  }
    	</script>
          <?php endif; ?> 
	    
	    
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="<?php echo e($assets_front); ?>/assets/images/dealrated-fav-ico.png" type="image/x-icon">
        <link rel="icon" sizes="16x16 32x32 64x64" href="<?php echo e($assets_front); ?>/assets/images/dealrated-fav-ico.png">
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo e($assets_front); ?>/assets/bootstrap/css/bootstrap.min.css">
        <script src="<?php echo e($assets_front); ?>/assets/js/jquery-3.4.1.min.js"></script>
        <script src="<?php echo e(asset('admin-assets/js/jquery.validate.min.js')); ?>"></script>
        <script src="<?php echo e($assets_front); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
        <script asyn src="<?php echo e($assets_front); ?>/assets/js/custom.js"></script>
        <link rel="stylesheet" href="<?php echo e($assets_front); ?>/assets/font-awesome/css/font-awesome.min.css">
        <link href="<?php echo e($assets_front); ?>/assets/css/style.css" rel="stylesheet" />

	  <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-92545444-2
        "></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'UA-92545444-2');
        </script>
        
	</head>
	<body>
		<?php echo $__env->yieldContent('content'); ?> 

	</body>
</html>
<?php /**PATH E:\xampp\htdocs\dealrated.com\framework\resources\views/front_layout/header.blade.php ENDPATH**/ ?>