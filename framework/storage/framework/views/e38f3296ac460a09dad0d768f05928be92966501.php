<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <url>
            <loc>https://dealrated.com/store/<?php echo e($store->slug); ?></loc>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</urlset><?php /**PATH /home/adsrwopw/dealrated.com/framework/resources/views/sitemap/stores.blade.php ENDPATH**/ ?>